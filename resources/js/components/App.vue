<template>
    <div id="app-component">
        <nav>
            <router-link to="/movies-vue">Movies</router-link>
            <router-link to="/movies-vue/create">Add Movie</router-link>
        </nav>
            <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>
