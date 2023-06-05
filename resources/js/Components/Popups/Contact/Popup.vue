<script setup>
import { onBeforeMount, computed, ref } from 'vue';

const contactData = ref({});

onBeforeMount(() => {
    fetchContactData();
})

const fetchContactData = () => {
    axios.get('/api/global/contact_popup_footer')
        .then((response) => {
            contactData.value["header"] = response.data.globals.data.header_content;
        })
    
    axios.get('/api/global/company')
        .then((response) => {
            contactData.value["details"] = response.data.globals.data;
        })
}

const getHeaderContent = computed(() => {
    if (contactData.value) {
        return contactData.value["header"];
    }

    return null;
})

const getContactDetails = computed(() => {
    if (contactData.value) {
        return contactData.value["details"];
    }

    return null;
})

const getPhoneDetails = computed(() => {
    const contactDetails = getContactDetails.value;
    if (contactDetails && contactDetails.phonenumber) {
        return  {
            'href': `tel:+${contactDetails.phonenumber}`,
            'text': contactDetails.phonenumber
        };
    }
    return false;
});


const getWhatsappDetails = computed(() => {
    const contactDetails = getContactDetails.value;
    if (contactDetails && contactDetails.phonenumber) {
        return {
            'href': `wa.me/+${contactDetails.phonenumber}`,
            'text': contactDetails.phonenumber
        };
    }
    return false;
});

const getMailDetails = computed(() => {
    const contactDetails = getContactDetails.value;
    if (contactDetails && contactDetails.email) {
        return {
            'href': `mailto:${contactDetails.email}`,
            'text': contactDetails.email
        };
    }
    return false;
});

</script>

<template>
    <div class="vue-contact-popup fixed top-0 left-0 h-screen w-screen bg-white z-50">
        <div class="container-wrapper relative w-screen h-screen flex items-end justify-center">
            <img src="../../../../assets/svg/chat-bg.svg" class=" bg-img absolute z-10 h-full w-full top-0 left-0 object-cover" />
            <div class="container relative z-20 overflow-hidden">
                <div class="header relative z-20" v-html="getHeaderContent"></div>
                <div class="contact-options relative px-6 bg-white">
                    <div class="inner relative">
                        <div class="row">
                            <div class="inner-row flex flex-col" v-if="getPhoneDetails">
                                <h3>Bel ons</h3>
                                <a class="row-link" :href="getPhoneDetails.href">{{ getPhoneDetails.text }}</a>
                                <span class="row-under-label">Op werkdagen bereikbaar van 08:30 - 17:30 uur</span>
                            </div>
                            <div class="inner-row flex flex-col" v-if="getMailDetails">
                                <h3>Mail ons</h3>
                                <a class="row-link" :href="getMailDetails.href">{{ getMailDetails.text }}</a>
                                <span class="row-under-label">We proberen binnen 24 uur te reageren</span>
                            </div>
                            <div class="inner-row flex flex-col" v-if="getWhatsappDetails">
                                <h3>WhatsApp ons</h3>
                                <a class="row-link" :href="getWhatsappDetails.href">{{ getWhatsappDetails.text }}</a>
                                <span class="row-under-label">Op werkdagen bereikbaar van 08:30 - 17:30 uur</span>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>