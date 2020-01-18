require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import routes from './routes';
import VueRouter from 'vue-router';
import HeaderComponent from './components/Header.vue';
import NavComponent from './components/Nav.vue';
import FeaturedComponent from './components/Featured.vue';
import BlogPostListComponent from './components/BlogPost/BlogPostList.vue';
import BlogPostItemComponent from './components/BlogPost/BlogPostItem.vue';

Vue.use(VueRouter);
const router = new VueRouter({
    routes
});

Vue.component('header-component', HeaderComponent);
Vue.component('nav-component', NavComponent);
Vue.component('featured-component', FeaturedComponent);
Vue.component('blog-post-list', BlogPostListComponent);
Vue.component('blog-post-item', BlogPostItemComponent);

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
