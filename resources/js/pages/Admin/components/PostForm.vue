<template>
    <div class="container">
        <h1>Create new Post</h1>
        <form @submit.prevent="onSubmit">
            <div class="form-group">
                <label for="txtPostTitle">Post Title *</label>
                <input v-model="title" type="text" maxlength="50" class="form-control" id="txtPostTitle" placeholder="Insert a post title ..." required>
            </div>
            <div class="form-group">
                <label for="txtPostContent">Post Content *</label>
                <textarea v-model="content" maxlength="5000" class="form-control" id="txtPostContent" rows="3" required></textarea>
            </div>
            <button class="btn btn-primary">Save & Publish</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['postToUpdate'],
        data () {
            return {
                id: this.postToUpdate ? this.postToUpdate._id: '',
                title: this.postToUpdate ? this.postToUpdate.title: '',
                content: this.postToUpdate ? this.postToUpdate.content: '',
            }
        },
        methods: {
            onSubmit() {
                if (!this.title || !this.content) {
                    alert('Title and content are required fields.');
                    return;
                }
                let method = 'savePost';
                let data = {
                    title: this.title,
                    content: this.content
                };
                if (this.postToUpdate) {
                    method = 'updatePost';
                    data.id = this.postToUpdate._id;
                }

                this.$store.dispatch(method, data).then(() => {
                    console.log('hide form...');
                });
            }
        }
    }
</script>
