<template>
  <div>
    <h3>Comments</h3>
    <ul>
      <li v-for="comment in comments" :key="comment.id">{{ comment.content }}</li>
    </ul>
    <textarea v-model="newComment" placeholder="Add a comment"></textarea>
    <button @click="addComment">Add Comment</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    movieId: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      comments: [],
      newComment: ''
    };
  },
  methods: {
      init() {
          this.fetchComments();
      },
      fetchComments() {
        axios.get(`/comments/${this.movieId}`).then(response => {
          this.comments = response.data;
        });
      },
      addComment() {
          axios.post(`/comment/${this.movieId}`, { content: this.newComment }).then(response => {
              this.fetchComments();
              this.newComment = '';
          });
      }
  }
};
</script>
