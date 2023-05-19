<script setup> 

const props = defineProps({
    content: {
        type: Object,
        required: true,
    }
});

</script>

<template>
    <div class="vue-case-slide swiper-slide relative">
        <div class="image-wrapper">
            <img :src="content.thumbnail.permalink" />
        </div>
        <div class="content-wrapper">
            <div class="content">
                <h4 class="actions">{{ content.project_actions }}</h4>
                <h2 class="title">{{ content.project_title }}</h2>
                <p class="description">{{ content.project_description }}</p>
            </div>
        </div>
    </div>

</template>