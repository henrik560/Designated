<script setup>
import { onMounted, ref } from 'vue';

const isActive = ref(false);
const faqMaxHeight = ref(null);

const props = defineProps({
    faq: {
        type: Object,
        required: true
    }
})

const toggleFAQ = () => {
    isActive.value = !isActive.value;
    toggleMaxHeight(isActive.value);
};

const toggleMaxHeight = (active) => {
    faqMaxHeight.value = active ? document.querySelector(`#${props.faq.id} .faq-answer .inner`).clientHeight + 40 : 0;
}

</script>

<template>
    <div class="vue-faq-item" :id="faq.id">
        <div @click="toggleFAQ" class="faq-question flex items-end cursor-pointer justify-between">
            <div class="title">
                <h3>{{ faq.title }}</h3>
            </div>
            <div class="arrow-wrapper">
                <div class="arrow-container flex items-center justify-center" :class="{ 'active': isActive }">
                    <div class="arrow"></div>
                </div>
            </div>
        </div>
        <div class="faq-answer" :class="{'open': isActive }" :style="{ maxHeight: faqMaxHeight + 'px' }">
            <div class="inner" :class="{ 'open': isActive }">
                <p class="text">{{ faq.answer }}</p>
            </div>
        </div>
    </div>
</template>