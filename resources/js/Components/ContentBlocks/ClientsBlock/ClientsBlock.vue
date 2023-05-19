<script setup>
import Client from './Client/Client.vue';
import { computed } from 'vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
});

const getClients = computed(() => {
    return props.content.clients ?? [];
});

</script>

<template>
    <div class="vue-clients-block">
        <div class="clients-wrapper mx-6">
            <div class="clients-container container">
                <div class="heading">
                    <div class="content text-center" v-html="content.content"></div>
                </div>
                <div class="clients flex flex-wrap flex-row">
                    <Client v-for="client in getClients" :key="client.id" :client="client" />
                </div>
            </div>
        </div>
    </div>
</template>