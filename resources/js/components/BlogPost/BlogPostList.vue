<template>
    <div>
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            From the Firehose
        </h3>
        <blog-post-item v-for="post in posts" :post="post" />
    </div>
</template>

<script>
    import BlogPostItemComponent from './BlogPostItem.vue';

    export default {
        props: {
            posts: {
                type: Array,
                default: () => {
                    return [];
                }
            }
        },
        components: {
            'blog-post-item': BlogPostItemComponent
        },
    }
</script>
