<template>
    <form @submit.prevent="submit">
        <div>
            <label for="title">Title</label>
            <input type="text" v-model="movie.title" required />
        </div>
        <div>
            <label for="description">Description</label>
            <textarea v-model="movie.description" required></textarea>
        </div>
        <div>
            <label for="year">Year</label>
            <input type="number" v-model="movie.year" required />
        </div>
        <button type="submit">Save</button>
    </form>
</template>

<script>
export default {
    props: {
        movie: {
            type: Object,
            required: false,
            default: () => ({
                title: '',
                description: '',
                year: null
            })
        }
    },
    mounted() {
        console.log('Child component mounted');
    },
    methods: {
        submit() {
            this.$emit('submit', this.movie);
        }
    }
};
</script>
