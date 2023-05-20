<script setup>
import PageHeader from '@/Components/ContentBlocks/PageHeader/PageHeader.vue';
import TextWithTableBlock from '@/Components/ContentBlocks/TextWithTableBlock/TextWithTableBlock.vue';
import TwoImagesBlock from '@/Components/ContentBlocks/TwoImagesBlock/TwoImagesBlock.vue'
import StepsList from '@/Components/ContentBlocks/StepsList/StepsList.vue';
import CasesSlider from '@/Components/ContentBlocks/CasesSlider/CasesSlider.vue';
import ClientsBlock from '@/Components/ContentBlocks/ClientsBlock/ClientsBlock.vue'
import FaqBlock from '@/Components/ContentBlocks/FaqBlock/FaqBlock.vue';
import TestimonialsBlock from '@/Components/ContentBlocks/TestimonialsBlock/TestimonialsBlock.vue';
import ImagesWithTextBlock from '@/Components/ContentBlocks/ImagesWithTextBlock/ImagesWithTextBlock.vue';
import TwoFormContentBlock from '@/Components/ContentBlocks/TwoFormsContentBlock/TwoFormContentBlock.vue'

const props = defineProps({
    block: Object
});

const isContentBlock = (handle) => {
    return props.block.collection.handle == handle;
}

</script>

<template>
    <PageHeader v-if="isContentBlock('page_header')" :content="block"></PageHeader>
    <TextWithTableBlock v-if="isContentBlock('text_field_with_table_block')" :content="block"></TextWithTableBlock>
    <TwoImagesBlock v-if="isContentBlock('two_images_block')" :content="block"></TwoImagesBlock>
    <StepsList v-if="isContentBlock('steps_list_block')" :content="block"></StepsList>
    <CasesSlider v-if="isContentBlock('cases_slider_block')" :content="block"></CasesSlider>
    <ClientsBlock v-if="isContentBlock('clients_block')" :content="block"></ClientsBlock>
    <FaqBlock v-if="isContentBlock('faq_block')" :content="block"></FaqBlock>
    <TestimonialsBlock v-if="isContentBlock('testimonials_block')" :content="block"></TestimonialsBlock>
    <ImagesWithTextBlock v-if="isContentBlock('images_with_text_block')" :content="block"></ImagesWithTextBlock>
    <TwoFormContentBlock v-if="isContentBlock('2_forms_with_content_block')" :content="block"></TwoFormContentBlock>
</template>