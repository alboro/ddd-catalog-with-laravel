<template>
    <div>
        <h1>{{ movie.title }}</h1>
        <p>Release Year: {{ movie.year }}</p>
        <p>{{ movie.description }}</p>
        <router-link :to="`/movies-vue/${movie.id}/edit`">Edit</router-link>
        <button @click="deleteMovie">Delete</button>
        <router-link to="/movies-vue">Back to Movies</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            movie: {}
        };
    },
    mounted() {
        this.fetchMovie();
    },
    methods: {
        fetchMovie() {
            axios.get(`/movies-vue/${this.$route.params.movie}`).then(response => {
                this.movie = response.data;
            });
        },
        deleteMovie() {
            if (confirm('Are you sure?')) {
                axios.delete(`/movies-vue/${this.movie}`).then(() => {
                    this.$router.push('/movies-vue');
                });
            }
        }
    }
};
</script>
