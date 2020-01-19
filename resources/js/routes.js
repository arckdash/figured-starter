import Home from './pages/Home';
import AuthSignIn from './pages/Auth/SignIn';
import Dashboard from './pages/Admin/Dashboard'
import DashboardPostList from './pages/Admin/components/PostList';

export default [
    { path: '/', component: Home, name: 'home' },
    { path: '/auth/sign-in', component: AuthSignIn, name: 'signIn' },
    { path: '/dashboard', component: Dashboard, name: 'dashboard', children: [
            { path: 'posts', component: DashboardPostList }
        ] },
];
