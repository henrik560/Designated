<script setup>
import { computed, onMounted, ref } from 'vue';
import Swiper from 'swiper'
import Testimonial from './Testimonial/Testimonial.vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const swiper = ref(null);

onMounted(() => {
    swiper.value = new Swiper('.testimonials-swiper', {
        slidesPerView: 1.20,
        spaceBetween: 25,
        loop: true,
        navigation: {
            prevEl: '.swiper-button-prev',
            nextEl: '.swiper-button-next',
        },
    });
});

const goPrev = () => {
    if (swiper.value) {
        swiper.value.slidePrev();
    }
}

const goNext = () => {
    if (swiper.value) {
        swiper.value.slideNext();
    }
}

const getTestimonials = computed(() => {
    return props.content.testimonials ?? [];
});

</script>

<template>
    <div class="vue-testimonials-block">
        <div class="testimonials-wrapper mx-6">
            <div class="testimonials-container container">
                <div class="header">
                    <div class="content" v-html="content.content"></div>
                </div>
                <div class="content testimonials-swiper swiper">
                    <div class="swiper-wrapper">
                        <Testimonial v-for="testimonial in getTestimonials" :key="testimonial.id" :testimonial="testimonial"></Testimonial>
                    </div>
                </div>
                <div class="swiper-selectors case-arrows relative flex items-center">
                    <div id="swiper-button-prev" @click="goPrev" class="swiper-button-prev"></div>
                    <div id="swiper-button-next" @click="goNext" class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</template>