<template>
    <div class="container-fluid">
        <navbar-component />
        <sidebar-component />
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import NavbarComponent from './components/Navbar';
    import SidebarComponent from './components/Sidebar';

    export default {
        components: {
            NavbarComponent,
            SidebarComponent
        }
    }
</script>
