<template>
  <div>
    <h1>Add New Movie</h1>
    <movie-form @submit="createMovie" />
  </div>
</template>

<script>
import MovieForm from './MovieForm.vue';
import axios from 'axios';

export default {
  components: {
    MovieForm
  },
  methods: {
    createMovie(movie) {
      axios.post('/movies-vue', movie).then(() => {
        this.$router.push('/movies-vue');
      });
    }
  }
};
</script>
