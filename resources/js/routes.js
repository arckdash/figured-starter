import Home from './pages/Home';
import AuthSignIn from './pages/Auth/SignIn';
import Dashboard from './pages/Admin/Dashboard'
import DashboardPostList from './pages/Admin/components/PostList';
import { store } from './store/store';

export default [
    { path: '/', component: Home, name: 'home' },
    { path: '/auth/sign-in', component: AuthSignIn, name: 'signIn' },
    { path: '/dashboard', component: Dashboard, name: 'dashboard', beforeEnter: (to, from, next) => {
            if (store.state.token) {
                next();
            } else {
                next('/auth/sign-in');
            }
        },
        children: [
            { path: 'posts', component: DashboardPostList }
        ]
    },
];
