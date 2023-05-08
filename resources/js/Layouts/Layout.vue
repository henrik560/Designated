<script setup>
import Navbar from '@/Components/Navbar/Navbar.vue';
</script>

<template>
    <div class="vue-default-layout">
        <Navbar></Navbar>

        <div class="layout-content">
            <slot />
        </div>
    </div>
</template>
