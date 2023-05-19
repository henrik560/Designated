<script setup>
import { computed } from 'vue';
import StepItem from './Step/StepItem.vue'

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
});

const getSteps = computed(() => {
    return props.content.steps_list ?? [];
})

</script>

<template> 
    <div class="vue-steps-list">
        <div class="steps-list-wrapper mx-6">
            <div class="steps-list-container container">
                <div class="list-header">
                    <div class="header" v-html="content.content"></div>
                </div>
                <div class="list">
                    <StepItem v-for="step, index in getSteps" :key="step.id" :step-index="index" :step="step"></StepItem>
                </div>
            </div>
        </div>
    </div>
</template>