<template>
    <Head title="Article Create"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles Settings</h1>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('article.index')"
                             :active="route().current('article.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Article
                </SidebarLink>
            </Sidebar>
        </template>
        <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            <div class="flex items-center justify-between">
                <h5 class="bominsoe-h5 text-gray-400">Article Create</h5>
            </div>
            <div class="flex">
                <div class="mt-4 flex w-1/2 flex-col pl-2">
                    <InputLabel for="article_title" value="Article Title"/>
                    <div class="mt-1 flex flex-col">
                        <TextInput
                            id="article_title"
                            v-model="form.article_title"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="article_title"
                        />
                        <InputError :message="form.errors.article_title" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-4 flex w-1/2 flex-col pl-2">
                    <InputLabel for="article_title" value="Category"/>
                    <div class="mt-1 flex flex-col">
                        <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false"
                                     :clear-on-select="false" :preserve-search="true" placeholder="Pick some"
                                     label="name" track-by="name" :preselect-first="true">
                        </multiselect>
                    </div>
                </div>
            </div>
            <div class="mt-3 p-3">
                <textarea
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                    name="" id="" cols="115" rows="10"></textarea>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Multiselect from "vue-multiselect";

export default {
    name: 'App',
    components: {
        AuthenticatedLayout,
        SidebarLink,
        Sidebar,
        InputError,
        Head,
        TextInput,
        InputLabel,
        "ejs-multiselect": Multiselect
    },
    data() {
        return {
            form: this.$inertia.form({
                article_title: '',
                article_category_id: '',
                article_body: '',
            }),
            value: [],
            options: [
                {name: 'Vue.js', language: 'JavaScript'},
                {name: 'Adonis', language: 'JavaScript'},
                {name: 'Rails', language: 'Ruby'},
                {name: 'Sinatra', language: 'Ruby'},
                {name: 'Laravel', language: 'PHP'},
                {name: 'Phoenix', language: 'Elixir'}
            ]
        }
    },
    computed: {},
    methods: {}
}

</script>

<style>
@import "node_modules/@syncfusion/ej2-base/styles/material.css";
@import "node_modules/@syncfusion/ej2-inputs/styles/material.css";
@import "node_modules/@syncfusion/ej2-vue-dropdowns/styles/material.css";
@import "node_modules/@syncfusion/ej2-buttons/styles/material.css";
</style>
