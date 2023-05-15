<template>
    <Head title="Article Create" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('article.index')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        Article Create
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('article.index')" :active="route().current('article.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                    </svg>
                    My Articles
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.lists')" :active="route().current('article.lists')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                    </svg>
                    My Articles List
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.create')" :active="route().current('article.create')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                    </svg>
                    Articles Create
                </SidebarLink>
            </Sidebar>
        </template>
        <form @submit.prevent="submit" method="post">
            <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
                <div class="flex items-center justify-between">
                    <h5 class="bominsoe-h5 text-gray-400">Article Create</h5>
                </div>
                <div class="flex">
                    <div class="mt-4 flex w-1/2 flex-col pl-2">
                        <InputLabel for="article_title" value="Article Title" />
                        <div class="mt-1 flex flex-col">
                            <TextInput id="article_title" v-model="form.article_title" type="text" class="mt-1 block w-full"
                                autocomplete="article_title" />
                            <InputError class="mt-2" :message="form.errors.article_title" />
                        </div>
                    </div>
                    <div class="mt-4 flex w-1/2 flex-col pl-2">
                        <InputLabel for="article_category" value="Category" />
                        <div class="mt-2 flex flex-col">
                            <Select v-model="form.article_category_id" multiple>
                                <Option v-for="(category, i) in categories" :value="category.id" :key="i">
                                    {{ category.name }}
                                </Option>
                            </Select>
                        </div>
                    </div>
                </div>
                <div class="mt-3 p-3">
                    <ckeditor class="bg-red-500" :editor="form.editor" v-model="form.article_body"
                        :config="form.editorConfig"></ckeditor>
                </div>

                <!-- Article Image -->

                <div class="mt-3 p-3">

                    <div class="flex items-center justify-center w-full">
                        <label for="attachment"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input @click="addAttchment" id="attachment" type="file" class="hidden"
                                @input="form.attachment = $event.target.files[0]" />
                        </label>
                    </div>

                </div>
            </div>
            <div class="mt-3">
                <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Article
                </primary-button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Breadcrumb, BreadcrumbItem, Form, Upload } from "view-ui-plus";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { data } from "autoprefixer";

export default {
    components: {
        AuthenticatedLayout,
        SidebarLink,
        Sidebar,
        Head,
        InputError,
        TextInput,
        InputLabel,
        PrimaryButton,
        Breadcrumb,
        BreadcrumbItem,
        Upload
    },
    props: {
        categories: [],
    },
    data: function () {
        return {
            form: new useForm({
                article_title: '',
                article_category_id: [],
                article_body: '',
                editor: ClassicEditor,
                editorConfig: {},
                attachment: null
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('article.store')
                , {
                    onFinish: () => this.form.reset('article_title', 'article_category_id', 'article_body', 'attachment'),
                }
            );
        },
    }
}
</script>

<style>
.ck-reset_all :not(.ck-reset_all-excluded *),
.ck.ck-reset,
.ck.ck-reset_all {
    background-color: #101827;
    color: white;
}

.ck.ck-editor__main>.ck-editor__editable {
    background-color: #101827;
    color: white;
    height: 500px;
}

.ivu-upload-drag {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
    border: none;
}

.ivu-upload-drag:hover {
    border: none;
}

.ivu-select-selection {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.ivu-select-selection {
    border: rgb(17 24 39);
}

.ivu-select-dropdown {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}
</style>
