<template>
  <button @click="likeMovie">Like {{ localLikeCount }}</button>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        movieId: {
          type: String,
          required: true
        },
        likeCount: {
          type: Number,
          required: true
        }
    },
    data() {
        return {
            localLikeCount: 0
        };
    },
    methods: {
        init() {
            this.localLikeCount = this.likeCount
        },
        likeMovie() {
            axios.post(`/like/${this.movieId}`).then(response => {
                this.localLikeCount += 1;
                this.$emit('update-like-count', this.localLikeCount);
            });
        }
    }
};
</script>
