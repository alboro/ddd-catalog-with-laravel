<template>
  <div>
    <h1>Movies</h1>
    <ul>
      <li v-for="movie in movies" :key="movie.id">
        <router-link :to="`/movies-vue/${movie.id}`">{{ movie.title }}</router-link>
        <router-link :to="`/movies-vue/${movie.id}/edit`">Edit</router-link>
        <button @click="deleteMovie(movie.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      movies: []
    };
  },
  mounted() {
    this.fetchMovies();
  },
  methods: {
    fetchMovies() {
      axios.get('/movies-vue').then(response => {
        this.movies = response.data;
      });
    },
    deleteMovie(id) {
      if (confirm('Are you sure?')) {
        axios.delete(`/movies-vue/${id}`).then(() => {
          this.fetchMovies();
        });
      }
    }
  }
};
</script>
