<script setup>
import { ref } from 'vue';
import ContactPopupIcon from './Icon.vue';
import ContactPopup from './Popup.vue'

const containerIsOpen = ref(false);

const toggleContainer = () => {
    containerIsOpen.value = !containerIsOpen.value;
}

</script>

<template>
    <div class="vue-contact-popup-wrapper">
        <ContactPopupIcon @click="toggleContainer"></ContactPopupIcon>
        <ContactPopup :class="containerIsOpen ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'"></ContactPopup>
    </div>
</template>
