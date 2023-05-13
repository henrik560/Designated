<script setup>

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <div class="vue-text-with-table">
        <div class="content-wrapper mx-6">
            <div class="container">
                <div class="content">
                    <div v-html="content.content"></div>
                </div>
            </div>
        </div>
    </div>
</template>