/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//0. Vue Router install
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//1. Define components
const Home = Vue.component('Home', require('./pages/Home.vue').default);
const Blog = Vue.component('Blog', require('./pages/Blog.vue').default);

//2. Map routes to components
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/blog',
        name: 'blog',
        component: Blog
    },
];

//3. Initialiaze router istance
const router = new VueRouter({
    mode: 'history',
    routes,
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('blog-posts', require('./components/BlogPosts.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    //4. Router injection
    router
});
