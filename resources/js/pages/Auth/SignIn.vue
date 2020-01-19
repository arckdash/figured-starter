<template>
    <div class="container text-center">
        <form @submit.prevent="onSubmit" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input v-model="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            onSubmit() {
                const formData = {
                    username: this.email,
                    password: this.password,
                    grant_type: "password",
                    client_id: 2,
                    client_secret: "X24LsSuFUs4ExXnclK4VXV2wwhztYWhgQlLnTese",
                    scope: "*"
                };

                this.$store.dispatch('signIn', formData)
                    .then(() => {
                        this.$router.replace('/dashboard');
                    });
            }
        }
    }
</script>
