<script setup>
import { computed } from 'vue';

const props = defineProps({
    step: {
        type: Object,
        required: true
    },
    stepIndex: {
        type: Number,
        required: true
    }
});

const getIndex = computed(() => {
    return props.stepIndex + 1;
})

</script>

<template>
    <div class="vue-step-item">
        <div class="content-container relative">
            <div class="step-title relative z-10"><h3>{{ getIndex }}. {{ step.title }}</h3></div>
            <div class="content relative z-10" v-html="step.content"></div>
            <div class="step-index absolute">
                <div class="index"><span class="counter">{{ getIndex }}</span></div>
            </div>
        </div>
    </div>
</template>