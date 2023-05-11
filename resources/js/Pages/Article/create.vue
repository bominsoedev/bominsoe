<template>
    <Head title="Article Create"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('dashboard')">
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
                <SidebarLink class="font-bold" :href="route('article.index')"
                             :active="route().current('article.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Articles
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.lists')"
                             :active="route().current('article.lists')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Articles List
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.create')"
                             :active="route().current('article.create')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
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
                        <InputLabel for="article_title" value="Article Title"/>
                        <div class="mt-1 flex flex-col">
                            <TextInput
                                id="article_title"
                                v-model="form.article_title"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="article_title"
                            />
                            <InputError class="mt-2" :message="form.errors.article_title"/>
                        </div>
                    </div>
                    <div class="mt-4 flex w-1/2 flex-col pl-2">
                        <InputLabel for="article_category" value="Category"/>
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
                <textarea
                    v-model="form.article_body"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                    name="" id="" cols="115" rows="10"></textarea>
                    <InputError class="mt-2" :message="form.errors.article_body"/>
                </div>
                <div class="mt-3 p-3">
                    <Upload
                        multiple
                        type="drag"
                        :headers="{'x-csrf-token': token}"
                        action="/app/file_upload">
                        <div style="padding: 20px 0">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3595d2"></Icon>
                            <p>Click or drag files here to upload</p>
                        </div>
                    </Upload>
                </div>
            </div>
            <div class="">
                <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Article
                </primary-button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Breadcrumb, BreadcrumbItem, Upload} from "view-ui-plus";

const submit = () => {
    form.post(route('article.store'), {
        onFinish: () => form.reset('article'),
    });
};

const props = defineProps({
    categories: [],
    token: '',

    async created() {
        this.token = this.$page.props.csrf_token;
    }
})

const form = useForm({
    article_title: '',
    article_category_id: [],
    article_body: '',
})

</script>

<style>
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
