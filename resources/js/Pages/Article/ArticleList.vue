<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import MasterTable from "@/Components/MasterTable.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import MasterATab from "@/Components/MasterATab.vue";
import ArticleCard from "@/Components/ArticleCard.vue";
import ArticleGrid from "@/Components/ArticleGrid.vue";
import moment from "moment-timezone";
import { Breadcrumb, BreadcrumbItem, Links } from "view-ui-plus";
import CategoryBotton from "@/Components/CategoryBotton.vue";

const props = defineProps({
    articles: []
})
const ths = [
    '', 'ID', 'Title', 'Slug', 'Description', 'When', 'Upload By', 'Control', 'Image'
]
</script>

<template>
    <Head title="Articles" />
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
                        Article Lists
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
        <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            <div class="flex items-center justify-between">
                <h5 class="bominsoe-h5 text-gray-400">Article List</h5>
            </div>
            <main class="mx-auto mt-6 space-y-6">
                <MasterTable :table_head="ths">
                    <tr v-for="article in articles" class="divide-y divide-gray-100 dark:divide-gray-700">
                        <td></td>
                        <td>{{ article.id }}</td>
                        <td>
                            <span class="text-xs">{{ article.title }}</span>
                            <br>
                            <div class="space-x-2">
                                <CategoryBotton :category="article.category"></CategoryBotton>
                            </div>
                        </td>
                        <td>{{ article.slug }}</td>
                        <td class="w-64">{{ article.excerpt }}</td>
                        <td class="w-32">{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</td>
                        <td>{{ article.author.username }}</td>
                        <td>
                            <a :href="route('article.edit', article)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <img :src="`storage/Images/ArticleAttachment/${article.photo.unique_name}`"
                                class="w-12 h-12 border rounded-md" />
                        </td>
                    </tr>
                </MasterTable>
            </main>

        </div>
    </AuthenticatedLayout>
</template>
