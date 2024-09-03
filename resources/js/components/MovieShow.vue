<template>
    <div>
        <h1>{{ movie.title }}</h1>
        <p>Release Year: {{ movie.year }}</p>
        <p>{{ movie.description }}</p>
        <router-link :to="`/movies-vue/${movie.id}/edit`">Edit</router-link>
        <button @click="deleteMovie">Delete</button>
        <router-link to="/movies-vue">Back to Movies</router-link>

        <like-button ref="likeButton" :movie-id="movie.id" :like-count="movie.likeCount"></like-button>
        <comment-section ref="commentSection" :movie-id="movie.id"></comment-section>
    </div>
</template>

<script>
import axios from 'axios';
import LikeButton from './LikeButton.vue';
import CommentSection from './CommentSection.vue';

export default {
    components: {
        LikeButton,
        CommentSection
    },
    data() {
        return {
            movie: {
                id: this.$route.params.movie,
                likeCount: 0
            }
        };
    },
    mounted() {
        this.fetchMovie().then(() => {
            this.$nextTick(() => {
                this.$refs.commentSection.init();
                this.$refs.likeButton.init();
            });
        });
    },
    methods: {
        fetchMovie() {
            return axios.get(`/movies-vue/${this.movie.id}`).then(response => {
                this.movie = response.data;
            });
        },
        deleteMovie() {
            if (confirm('Are you sure?')) {
                axios.delete(`/movies-vue/${this.movie.id}`).then(() => {
                    this.$router.push('/movies-vue');
                });
            }
        }
    }
};
</script>
