<template>
    <div class="bg-panel-800 p-3 rounded-xl">
        <div class="text-end">
            <label class="sr-only" for="category-search">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              fill-rule="evenodd"></path>
                    </svg>
                </div>
                <form @submit.prevent="category_search(search)">
                    <input id="category-search"
                           v-model="search"
                           class="block p-1 pl-10 text-sm text-gray-900 border border-sky-500 ring-1 rounded-lg w-80 bg-gray-50 focus:ring-sky-500 focus:border-sky-500 dark:bg-panel-800 dark:border-sky-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                           placeholder="Search for category"
                    type="text">
                </form>
                <div class="absolute inset-y-0 left-72 flex items-center pr-3">
                    <a href="#" v-on:click.prevent="route('category.index')">
                        <svg class="bi bi-x" fill="currentColor" height="16" viewBox="0 0 16 16"
                             width="16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="py-2">
            <table class="w-full text-left mt-3">
                <thead v-if="table_head" class="text-gray-500">
                <tr class="h-10">
                    <th v-for="th in table_head" :class="classes" scope="col">
                        {{ th }}
                    </th>
                </tr>
                </thead>
                <tbody>
                <slot/>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

const search = ref("")

defineProps({
    table_head: [],
    name: "MasterTable",
    classes: "pr-4 font-normal"
})

const category_search = (search) => {
    Inertia.get('/session/categories', {search: search},{
        queryStringArrayFormat:{},
        preserveState:true,
        replace:true
    });
};




</script>
