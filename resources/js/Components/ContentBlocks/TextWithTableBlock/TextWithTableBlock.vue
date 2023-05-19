<script setup>
import TableRow from './Table/TableRow.vue';
import { computed } from 'vue';

const props = defineProps({
    content: {
        type: Object,
        required: true
    }
})

const getCells = computed(() => {
    return props.content.table ?? [];
})

</script>

<template>
    <div class="vue-text-with-table">
        <div class="content-wrapper mx-6">
            <div class="container mx-auto">
                <div class="content">
                    <div v-html="content.content"></div>
                </div>
                <div class="table-container">
                    <div class="table-wrapper p-6">
                        <table class="table">
                            <tbody>
                                <tr class="table-header-row">
                                    <th class="table-header-item empty-row"></th>
                                    <th class="table-header-item custom">Maatwerk website</th>
                                    <th class="table-header-item template">Template website</th>
                                </tr>
                                <TableRow v-for="row, index in getCells" :data="row.cells" :key="index"></TableRow>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>