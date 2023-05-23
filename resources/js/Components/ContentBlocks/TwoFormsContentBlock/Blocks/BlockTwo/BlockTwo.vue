<script setup>

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <div class="block-two-wrapper px-6">
        <div class="block-two-container container">
            <div class="content" v-html="content.content_block_2"></div>
        </div>
    </div>
</template>