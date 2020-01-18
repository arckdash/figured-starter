<template>
    <div class="blog-post">
        <h2 class="blog-post-title">{{ post.title }}</h2>
        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
        <p>{{ post.content }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        }
    }
</script>
