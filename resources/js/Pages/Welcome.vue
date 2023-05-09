<script setup>
import axios from 'axios';
import { onMounted } from 'vue';

const pageContent = () => {
    // axios.get(`/api/pages/${window.location.pathname}`)
    axios.get(`/api/pages/website-laten-maken`)
        .then((response) => {
            console.log(response.data.entry);
        })
}

onMounted(() => {
    pageContent();
})

</script>

<template>
    <Head title="Maatwerk websites die resultaat opleveren | Designated" />

    <div class="page-wrapper">
        <h1>Wij maken conversiegerichte websites</h1>
        <p>Suvteststsetset et et set est et setse </p>
    </div>
</template>

