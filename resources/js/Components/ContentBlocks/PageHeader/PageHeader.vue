<script setup>

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <div class="vue-page-header">
        <div class="header-wrapper mx-6" v-if="content.header_content">
            <div class="container header">
                <div class="content">
                    <div v-html="content.header_content"></div>
                </div>
            </div>
        </div>
        <div class="sub-header" v-if="content.header_usps">
            <div class="wrapper mx-6">
                <div class="container sub-wrapper">
                    <div class="usps-wrapper">
                        <div class="image-wrapper">
                            <img class="background-image" src="../../../../assets/images/blurred-bg.jpg"  alt="Usps background animated"/>
                        </div>
                        <div class="usps-list" v-html="content.header_usps"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-columns" v-if="content.header_sub_content">
            <div class="columns-wrapper mx-6">
                <div class="columns container" v-html="content.header_sub_content"></div>
            </div>
        </div>
    </div>
</template>