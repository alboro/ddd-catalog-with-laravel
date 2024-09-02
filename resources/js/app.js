import './bootstrap';
import { createApp } from 'vue';

import router from './router';
import App from './components/App.vue';
import MovieList from './components/MovieList.vue';
import MovieCreate from './components/MovieCreate.vue';
import MovieEdit from './components/MovieEdit.vue';
import MovieShow from './components/MovieShow.vue';

const app = createApp(App);

app.use(router);
app.component('movie-list', MovieList);
app.component('movie-create', MovieCreate);
app.component('movie-edit', MovieEdit);
app.component('movie-show', MovieShow);

app.mount('#app');
