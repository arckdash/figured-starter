require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import routes from './routes';
import VueRouter from 'vue-router';
import { store } from './store/store';

Vue.use(VueRouter);
const router = new VueRouter({
    routes,
    // mode: 'history'
});

export const eventBus = new Vue();

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
