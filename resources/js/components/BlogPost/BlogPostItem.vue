<template>
    <div class="blog-post">
        <h2 class="blog-post-title">{{ post.title }}</h2>
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
