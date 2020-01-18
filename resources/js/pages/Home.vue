<template>
    <div class="container">
        <header-component />
        <hr>
        <nav-component :categories="categories" />
        <featured-component />
        <blog-post-list-component :posts="posts"/>
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
                categories: [
                    'World',
                    'U.S.',
                    'Technology',
                    'Design',
                    'Culture',
                    'Business',
                    'Politics',
                    'Opinion',
                    'Science',
                    'Health',
                    'Style',
                    'Travel'
                ],
                posts: [
                    {
                        title: 'title_1',
                        content: 'content_1',
                        isFeatured: false,
                    },
                    {
                        title: 'title_2',
                        content: 'content_2',
                        isFeatured: true,
                    }
                ]
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
