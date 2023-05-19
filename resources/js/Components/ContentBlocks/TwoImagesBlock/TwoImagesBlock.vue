<script setup>
import { computed } from 'vue';


const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const getImages = computed(() => {
    return props.content.images ?? [];
})

</script>

<template>
    <div class="vue-two-images-block">
        <div class="images-wrapper mx-6">
            <div class="images-container container relative">
                <div class="image absolute" v-for="image, index in getImages" :key="index" >
                    <img :src="image.permalink" />
                </div>
            </div>
        </div>
    </div>
</template>