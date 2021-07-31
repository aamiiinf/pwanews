import Vue from 'vue';
import VueRouter from 'vue-router';
import NewsComponent from './components/NewsComponent.vue';
import Post from './components/post.vue';

Vue.use(VueRouter);


const routes = [
    { name: 'posts', path: '/', component: NewsComponent },
    { name: 'post', path: '/post/:id', component: Post },
]


const router = new VueRouter({
    mode: 'history',
    routes
});




export default router;

