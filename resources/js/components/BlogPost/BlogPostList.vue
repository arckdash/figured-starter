<template>
    <div>
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest Blog Posts
        </h3>
        <blog-post-item v-for="post in posts" :key="post.title" :post="post" />
    </div>
</template>

<script>
    import BlogPostItemComponent from './BlogPostItem.vue';

    export default {
        computed: {
            posts() {
                return this.$store.state.posts;
            }
        },
        components: {
            'blog-post-item': BlogPostItemComponent
        },
        created() {
            this.$store.dispatch('getPostList');
        }
    }
</script>
