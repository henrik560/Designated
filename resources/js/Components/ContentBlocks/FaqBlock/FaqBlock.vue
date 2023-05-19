<script setup>
import { computed } from 'vue';
import FaqItem from './FaqItem/FaqItem.vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const getFaqItems = computed(() => {
    return props.content.questions ?? [];
})

</script>

<template>
    <div class="vue-faq-block">
        <div class="faq-wrapper mx-6">
            <div class="faq-container container">
                <div class="header">
                    <div class="content" v-html="content.content"></div>
                </div>
                <div class="faq-list">
                    <FaqItem v-for="faq in getFaqItems" :key="faq.id" :faq="faq"></FaqItem>
                </div>
            </div>
        </div>
    </div>
</template>