<script setup>
import Navbar from '@/Components/Navbar/Navbar.vue';
import ContactPopup from '@/Components/Popups/Contact/Contact.vue';
</script>

<template>
    <div class="vue-default-layout">
        <Navbar></Navbar>

        <div class="layout-content">
            <slot />
        </div>

        <ContactPopup></ContactPopup>
    </div>
</template>
