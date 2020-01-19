<template>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <router-link to="/dashboard" class="navbar-brand col-sm-3 col-md-2 mr-0">Admin Dashboard</router-link>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="#" @click="signOut" class="nav-link">Sign out</a>
            </li>
        </ul>
    </nav>
</template>

<script>

    export default {
        methods: {
            signOut() {
                this.$store.dispatch('signOut')
                    .then(() => {
                        this.$router.replace('/');
                    });
            }
        }
    }
</script>
