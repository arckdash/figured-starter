import Home from './pages/Home';
import AuthSignIn from './pages/Auth/SignIn';

export default [
    { path: '/', component: Home, name: 'home' },
    { path: '/auth/sign-in', component: AuthSignIn, name: 'signIn' },
];
