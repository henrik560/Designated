<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

import ContentBlock from '@/Components/ContentBlock.vue';
import { Head } from '@inertiajs/vue3';

const pageContent = ref([]);

const fetchPageContent = () => {
    axios.get(`/api/pages${window.location.pathname}`)
        .then((response) => {
            if (response.data.entry) {
                pageContent.value = response.data.entry.content_blocks;
            }
        })
}

onMounted(() => {
    fetchPageContent();
})

</script>

<template>
    <Head title="Maatwerk websites die resultaat opleveren | Designated" />

    <div class="page-wrapper">
        <ContentBlock v-for="block in pageContent" :key="block.id" :block="block"></ContentBlock>
    </div>
</template>

