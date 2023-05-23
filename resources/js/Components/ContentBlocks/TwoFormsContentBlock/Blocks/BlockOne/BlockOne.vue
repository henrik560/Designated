<script setup>
import axios from 'axios';
import { computed, ref } from 'vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
});

// References
const userRef = ref(null);
const emailRef = ref(null);
const phoneRef = ref(null);
const formResponse = ref(null);

// Submit form
const submitForm = () => {
    const formData = {
        email: emailRef.value,
        name: userRef.value,
        phoneNumber: phoneRef.value
    };

    axios
        .post('/api/form/consultation-request', formData)
        .then((response) => {
            formResponse.value = response;
            clearFormData();
        })
        .catch((error) => {
            formResponse.value = error.response;
        });
};

// Clear form data
const clearFormData = () => {
    userRef.value = null;
    emailRef.value = null;
    phoneRef.value = null;
};

// Computed properties
const hasFormResponse = computed(() => {
    return formResponse.value !== null;
});

const responseDisplayStyle = computed(() => {
    if (hasFormResponse && formResponse.value.status === 422) {
        return 'bg-red-200 text-red-500';
    } else if (hasFormResponse && formResponse.value.status === 200) {
        return 'bg-green-200 text-green-500';
    }
});

const responseMessage = computed(() => {
    if (hasFormResponse) {
        return formResponse.value.data.message;
    }
});
</script>

<template>
    <div class="block-one-wrapper mx-6">
        <div class="block-one-container container">
            <div class="inner">
                <div class="content" v-html="content.content_block_1"></div>
                <form class="form">
                    <div class="form-item flex flex-col">
                        <label class="item-label" for="name">Naam <span class="required">*</span></label>
                        <input v-model="userRef" class="item-input" type="text" name="name">
                    </div>
                    <div class="form-item flex flex-col">
                        <label class="item-label" for="email">E-mailadres <span class="required">*</span></label>
                        <input v-model="emailRef" class="item-input" type="email" name="email">
                    </div>
                    <div class="form-item flex flex-col">
                        <label class="item-label" for="phonenumber">Telefoonnummer <span class="required">*</span></label>
                        <input v-model="phoneRef" class="item-input" type="text" name="phonenumber">
                    </div>
                    <div class="form-item form-message flex flex-col p-4" :class="responseDisplayStyle"
                        v-if="hasFormResponse">
                        <div class="form-message">{{ responseMessage }}</div>
                    </div>
                    <div class="form-item submit-button flex flex-col">
                        <input @click="submitForm" value="Versturen" class="submit-button text-center">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
