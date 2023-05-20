<script setup>
import { ref } from 'vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const userRef = ref(null);
const emailRef = ref(null);
const PhoneRef = ref(null);

</script>

<template>
    <div class="vue-two-form-content-block">
        <div class="progress w-screen flex">
            <div class="progression w-1/2"></div>
            <div class="remaining w-1/2"></div>
        </div>
        <div class="block-one-wrapper mx-6">
            <div class="block-one-container container">
                <div class="inner">
                    <div class="content" v-html="content.content_block_1"></div>
                    <form class="form">
                        <div class="form-item flex flex-col">
                            <label class="item-label" for="name">Naam <span class="required">*</span></label>
                            <input class="item-input" type="text" name="name">
                        </div>
                        <div class="form-item flex flex-col">
                            <label class="item-label" for="email">E-mailadres <span class="required">*</span></label>
                            <input class="item-input" type="email" name="email">
                        </div>
                        <div class="form-item flex flex-col">
                            <label class="item-label" for="phonenumber">Telefoonnummer <span class="required">*</span></label>
                            <input class="item-input" type="text" name="phonenumber">
                        </div>
                        <div class="form-item submit-button flex flex-col">
                            <input type="submit" value="Versturen" class="submit-button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>