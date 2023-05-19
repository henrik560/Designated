<script setup>

const props = defineProps({
    data: {
        type: Object,
        required: true
    }
});

</script>

<template>
    <tr class="vue-table-row">
        <td class="table-info py-3 px-5">
            <div class="row-data-content flex gap-4 items-center">
                <span class="title">{{ data[0] }}</span>
                <div class="info tooltip-group group">
                    <div class="tooltip"><i class="fa-solid fa-circle-info text-gray-400"></i></div>
                    <span class="tooltip-content z-20 pointer-events-none bg-zinc-950 text-white duration-300 invisible opacity-0 group-hover:visible group-hover:opacity-100">{{ data[1] }}</span>
                </div>
            </div>
        </td>
        <td class="table-check"><div class="checkmark flex justify-center py-3 px-5"><i class="fa-solid fa-check checkmark-icon font-icon text-white bg-green-500 rounded-full"></i></div></td>
        <td class="table-cross"><div class="crossmark flex justify-center py-3 px-5"><i class="fa-solid fa-xmark crossmark-icon font-icon text-white bg-red-500 rounded-full"></i></div></td>
    </tr>
</template>