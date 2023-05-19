<script setup>

const props = defineProps({
    testimonial: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <div class="vue-testimonial swiper-slide">
        <div class="item-wrapper">
            <div class="inner">
                <q class="quote">{{ testimonial.review }}</q>
                <div class="reviewer flex gap-4">
                    <div class="image-wrapper">
                        <img :src="testimonial.thumbnail.permalink" />
                    </div>
                    <div class="user flex flex-col">
                        <span class="name">{{ testimonial.client_name }}</span>
                        <span class="function">{{ testimonial.clients_function }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>