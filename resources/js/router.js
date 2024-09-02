import { createRouter, createWebHistory } from 'vue-router';
import MovieList from './components/MovieList.vue';
import MovieCreate from './components/MovieCreate.vue';
import MovieEdit from './components/MovieEdit.vue';
import MovieShow from './components/MovieShow.vue';

const routes = [
    { path: '/movies-vue', component: MovieList },
    { path: '/movies-vue/create', component: MovieCreate },
    { path: '/movies-vue/:movie', component: MovieShow, props: true },
    { path: '/movies-vue/:movie/edit', component: MovieEdit, props: true }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
