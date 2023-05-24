<template>
    <Head title="Article Create"/>
    <AuthenticatedLayout :nav-status="true" :classes="'max-w-screen-xl'">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-200 leading-tight mb-8">Articles Settings</h1>
        </template>
        <template #sidebar>
            <SidebarLink :active="route().current('article.index')" :href="route('article.index')"
                         class="font-bold">
                <svg class="bi bi-postcard mr-4 text-gray-400" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                          fill-rule="evenodd"/>
                </svg>
                My Articles
            </SidebarLink>
            <SidebarLink :active="route().current('article.lists')" :href="route('article.lists')"
                         class="font-bold">
                <svg class="bi bi-postcard mr-4 text-gray-400" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                          fill-rule="evenodd"/>
                </svg>
                My Articles List
            </SidebarLink>
            <SidebarLink :active="route().current('article.create')" :href="route('article.create')"
                         class="font-bold">
                <svg class="bi bi-postcard mr-4 text-gray-400" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"
                          fill-rule="evenodd"/>
                </svg>
                Articles Create
            </SidebarLink>
        </template>
        <form method="post" @submit.prevent="submit">
            <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
                <div class="flex items-center justify-between">
                    <h5 class="bominsoe-h5 text-gray-400">Article Edit</h5>
                </div>
                <div class="flex">
                    <div class="mt-4 flex w-1/2 flex-col pl-2">
                        <InputLabel for="article_title" value="Article Title"/>
                        <div class="mt-1 flex flex-col">
                            <TextInput
                                id="article_title"
                                v-model="form.article_title"
                                autocomplete="article_title"
                                class="mt-1 block w-full"
                                type="text"
                            />
                            <InputError :message="form.errors.article_title" class="mt-2"/>
                        </div>
                    </div>
                    <div class="mt-4 flex w-1/2 flex-col pl-2">
                        <InputLabel for="article_title" value="Category"/>
                        <div class="mt-2 flex flex-col">
                            <Select v-model="form.article_category_id" multiple>
                                <Option v-for="(category, i) in categories" :key="i" :value="category.id">
                                    {{ category.name }}
                                </Option>
                            </Select>
                        </div>
                    </div>
                </div>
                <div class="mt-3 p-3">
                <textarea
                    id=""
                    v-model="form.article_body"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm" cols="115" name="" rows="10"></textarea>
                    <InputError :message="form.errors.article_body" class="mt-2"/>
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

const submit = () => {
    form.post(route('article.update'), {
        onSuccess: () => form.reset(),
    });
};

defineProps({
    categories: [],
    article: {}
})
const form = useForm({
    article_title: props.article.title,
    article_category_id: [props.article.category_id],
    article_body: props.article.body,
})

</script>

<style>
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
