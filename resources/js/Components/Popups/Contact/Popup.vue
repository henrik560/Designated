<script setup>
</script>

<template>
    <div class="vue-contact-popup fixed top-0 left-0 h-screen w-screen bg-red-500 z-50">
        <div class="container-wrapper" v-if="containerIsOpen">
            <div class="container">
                <div class="header"></div>
                <div class="contact-options"></div>
            </div>
        </div>
        <div class="icon" @click="toggleContainer">
            <ContactPopupIcon></ContactPopupIcon>
        </div>
    </div>
</template>