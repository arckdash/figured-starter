<template>
    <div class="container">
        <header-component />
        <hr>
        <nav-component :categories="categories" />
        <featured-component />
        <blog-post-list-component />
        <footer-component />
    </div>
</template>

<script>
    import HeaderComponent from '../components/Header.vue';
    import FooterComponent from '../components/Footer.vue';
    import NavComponent from '../components/Nav.vue';
    import FeaturedComponent from '../components/Featured.vue';
    import BlogPostListComponent from '../components/BlogPost/BlogPostList.vue';

    export default {
        data: () => {
            return {
                // categories: this.$store.state.categories,
                categories: [],
            }
        },
        components: {
            HeaderComponent,
            FooterComponent,
            NavComponent,
            FeaturedComponent,
            BlogPostListComponent
        }
    }
</script>
