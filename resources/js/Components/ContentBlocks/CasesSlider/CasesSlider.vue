<script setup>
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import { computed, onMounted, ref } from 'vue';
import CaseSlide from './Case/CaseSlide.vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
});

const swiper = ref(null);

onMounted(() => {
    swiper.value = new Swiper('.cases-swiper', {
        slidesPerView: 1.25,
        centeredSlides: true,
        spaceBetween: 32,
        slidesOffsetBefore: 0,
        navigation: {
            prevEl: '.swiper-button-prev',
            nextEl: '.swiper-button-next',
        },
        on: {
            reachBeginning: () => {
                document.querySelector('.swiper-button-prev').classList.add('swiper-button-disabled');
            },
            reachEnd: () => {
                document.querySelector('.swiper-button-next').classList.add('swiper-button-disabled');
            },
            fromEdge: () => {
                document.querySelector('.swiper-button-prev').classList.remove('swiper-button-disabled');
                document.querySelector('.swiper-button-next').classList.remove('swiper-button-disabled');
            },
            slideNextTransitionStart: () => {
                swiper.value.params.spaceBetween = 32;
            },
            slidePrevTransitionStart: () => {
                swiper.value.params.spaceBetween = 32;
            },
            slideNextTransitionEnd: () => {
                swiper.value.params.spaceBetween = 25;
            },
            slidePrevTransitionEnd: () => {
                swiper.value.params.spaceBetween = 25;
            },
        },
    });
});

const getCases = computed(() => {
    return props.content.projects ?? [];
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

</script>

<template>
    <div class="vue-cases-slider relative overflow-hidden">
        <img class="background-image" src="../../../../assets/images/grained-bg.jpg" />
        <div class="slider-container relative">
            <div class="content">
                <div class="intro" v-html="content.content"></div>
                <div class="swiper cases-swiper">
                    <div class="swiper-wrapper">
                        <CaseSlide v-for="caseItem in getCases" :key="caseItem.id" :content="caseItem"></CaseSlide>
                    </div>
                </div>
            </div>
            <div class="swiper-selectors case-arrows absolute flex items-center">
                <div id="swiper-button-prev" @click="goPrev"
                    class="swiper-button-prev items-center border-none cursor-pointer flex flex-col justify-center m-0 relative t-0">
                </div>
                <div id="swiper-button-next" @click="goNext"
                    class="swiper-button-next items-center border-none cursor-pointer flex flex-col justify-center m-0 relative t-">
                </div>
            </div>
        </div>
    </div>
</template>
