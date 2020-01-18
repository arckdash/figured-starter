<template>
    <div class="container">
        <header-component />
        <hr>
        <nav-component :categories="categories" />
        <featured-component />
        <blog-post-list :posts="posts"/>
    </div>
</template>

<script>
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
        }
    }
</script>
