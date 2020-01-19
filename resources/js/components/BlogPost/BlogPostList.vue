<template>
    <div>
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest Blog Posts
        </h3>
        <blog-post-item v-for="post in posts" :key="post.title" :post="post" />
    </div>
</template>

<script>
    import axios from 'axios';
    import BlogPostItemComponent from './BlogPostItem.vue';

    export default {
        data: () => {
            return {
                posts: []
            };
        },
        components: {
            'blog-post-item': BlogPostItemComponent
        },
        created() {
            axios.get('http://localhost:8080/api/v1/posts')
                .then((response) => {
                    this.posts = response.data.posts;
                    console.log(this.posts, response.data);
                });
        }
    }
</script>
