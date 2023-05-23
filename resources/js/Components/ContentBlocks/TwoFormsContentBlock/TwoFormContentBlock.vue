<script setup>
import axios from 'axios';
import { ref, onMounted, computed } from 'vue';
import BlockOne from './Blocks/BlockOne/BlockOne.vue';
import BlockTwo from './Blocks/BlockTwo/BlockTwo.vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const companyData = ref([]);

onMounted(() => {
    fetchCompanyData();
})

const fetchCompanyData = () => {
    axios.get(`/api/global/company`)
        .then((response) => {
            if (response.data.globals) {
                companyData.value = response.data.globals.data;
            }
        })
}

const getMailtoHref = computed(() => {
    return `mailto:${companyData.email}`
})

const getCallUsHref = computed(() => {
    return `tel:+${companyData.phonenumber}`
})

</script>

<template>
    <div class="vue-two-form-content-block">
        <div class="progress w-screen flex">
            <div class="progression w-1/2"></div>
            <div class="remaining w-1/2"></div>
        </div>
        
        <BlockOne :content="content"></BlockOne>
        <BlockTwo :content="content"></BlockTwo>

        <div class="contact-block">
            <div class="content-wrapper mx-6">
                <div class="content container">
                    <h4>{{ content.footer_text_block_2 }}</h4>
                    <div class="contact-info flex gap-5">
                        <div class="call flex flex-col">
                            <span>Bel ons</span>
                            <a :href="getCallUsHref">{{ companyData.phonenumber }}</a>
                        </div>
                        <div class="mail flex flex-col">
                            <span>E-mail ons</span>
                            <a :href="getMailtoHref">{{ companyData.email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>