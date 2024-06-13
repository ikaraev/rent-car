<template>
    <Head />
    <Header />
    <slot />
    <Footer />
</template>

<script>
import Header from "@/Partials/Frontend/Index/Header.vue";
import Footer from "@/Partials/Frontend/Index/Footer.vue";
import { Head } from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite'
import '../../styles/css/app.css'

export default {
    components: {Footer, Header, Head},
    mounted() {
        initFlowbite()
    }
}
</script>

<style scoped>

</style>
