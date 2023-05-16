<template>
    <div class="py-2">
        <table class="w-full text-left mt-3" >
            <thead v-if="table_head" class="text-gray-500">
            <tr class="h-10">
                <th v-for="th in table_head" scope="col" :class="classes">
                   {{th}}
                </th>
            </tr>
            </thead>
            <tbody>
            <slot/>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps( {
    table_head:[],
    name: "MasterTable",
    classes:"pr-4 font-normal"
})

</script>
