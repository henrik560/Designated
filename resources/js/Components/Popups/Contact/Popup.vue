<script setup>
import { onBeforeMount, onMounted, ref } from 'vue';

const contactData = ref(null);

const fetchContactData = () => {
    axios.get('/api/global/contact_popup_footer')
        .then((response) => {
            contactData.value = response.data.globals.data;
        })
}

onBeforeMount(() => {
    fetchContactData();
})

</script>

<template>
    <div class="vue-contact-popup fixed top-0 left-0 h-screen w-screen bg-white z-50">
        <div class="container-wrapper relative w-screen h-screen flex items-end justify-center">
            <img src="../../../../assets/svg/chat-bg.svg" class="absolute z-10 h-full w-full top-0 left-0 opacity-30 object-cover" />
            <div class="container relative z-20 overflow-hidden">
                <div class="header relative z-20" v-html="contactData.header_content"></div>
                <div class="contact-options"></div>
            </div>
        </div>
    </div>
</template>