<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="vue-navbar container">
        <div class="company-logo sm:mx-auto mx-8 h-25 flex items-center">
            <ApplicationLogo></ApplicationLogo>
        </div>

        <div class="visible-desktop hidden md:flex">
            <!-- @TODO DESKTOP -->
            <!-- //CODE -->
        </div>
    </div>
</template>