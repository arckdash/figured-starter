<template>
    <div class="table-responsive container">
        <button class="btn btn-primary" @click="formToggle" >Add new Post</button>
        <post-form-component v-if="displayForm" :postToUpdate="postToUpdate" />

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="width:200px" >Title</th>
                    <th>Content</th>
                    <th style="width:100px">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post._id">
                    <td>{{ post._id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.content }}</td>
                    <td>
                        <button class="btn btn-warning" @click="loadPost(post)">Edit</button>
                        <button class="btn btn-danger" @click="deletePost(post)">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import PostFormComponent from './PostForm';

    export default {
        created() {
            this.$store.dispatch('getPostList');
        },
        data() {
            return {
                displayForm: false,
                postToUpdate: null
            }
        },
        computed: {
            posts() {
                return this.$store.state.posts;
            }
        },
        methods: {
            formToggle() {
                this.displayForm = !this.displayForm;
            },
            loadPost(post) {
                this.postToUpdate = post;
                this.formToggle();
            },
            deletePost(post) {
                this.$store.dispatch('deletePost', post._id);
            }
        },
        components: {
            PostFormComponent
        }
    }
</script>
