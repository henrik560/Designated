<script setup>
import { computed } from "vue";


const props = defineProps({
    content: {
        type: Object,
        required: true
    }
});

const getListedImages = computed(() => {
    const result = [];

    for (let i = 0; i < props.content.images.length; i += 2) {
        result.push(props.content.images.slice(i, i + 2));
    }

    return result;
})
</script>

<template>
    <div class="vue-images-with-text-block">
        <div class="block-wrapper mx-6">
            <div class="block-container container flex flex-col gap-12">
                <div class="images flex gap-6">
                    <div class="column left flex flex-col gap-6" v-if="getListedImages[0]">
                        <div class="image-wrapper relative" v-for="image in getListedImages[0]" :key="image.id">
                            <img class="image" :src="image.permalink" />
                        </div>
                    </div>
                    <div class="column right justify-center flex items-center" v-if="getListedImages[1]">
                        <div class="image-wrapper relative" v-for="image in getListedImages[1]" :key="image.id">
                            <img class="image" :src="image.permalink" />
                        </div>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div class="content" v-html="content.content"></div>
                </div>
            </div>
        </div>
    </div>
</template>