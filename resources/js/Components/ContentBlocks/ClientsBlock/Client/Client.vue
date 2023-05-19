<script setup>

const props = defineProps({
    client: {
        type: Object,
        required: true
    }
})

</script>

<template >
    <img :src="client.permalink" class="client-item w-1/2" />
</template>