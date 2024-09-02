<template>
  <div>
    <h1>Edit Movie</h1>
    <movie-form :movie="movie" @submit="updateMovie" />
  </div>
</template>

<script>
import MovieForm from './MovieForm.vue';
import axios from 'axios';

export default {
  components: {
    MovieForm
  },
  data() {
    return {
      movie: {}
    };
  },
  mounted() {
      this.$nextTick(() => {
          this.fetchMovie();
      });
  },
  methods: {
    fetchMovie() {
      axios.get(`/movies-vue/${this.$route.params.movie}`).then(response => {
        this.movie = response.data;
      });
    },
    updateMovie(movie) {
      axios.put(`/movies-vue/${this.$route.params.movie}`, movie).then(() => {
        this.$router.push('/movies-vue');
      });
    }
  }
};
</script>
