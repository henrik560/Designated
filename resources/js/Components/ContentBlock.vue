<script setup>
import PageHeader from '@/Components/ContentBlocks/PageHeader/PageHeader.vue';
import TextWithTableBlock from '@/Components/ContentBlocks/TextWithTableBlock/TextWithTableBlock.vue';

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
</template>