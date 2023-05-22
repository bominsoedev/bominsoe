<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import MasterTable from "@/Components/MasterTable.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import MasterATab from "@/Components/MasterATab.vue";
import ArticleCard from "@/Components/ArticleCard.vue";
import ArticleGrid from "@/Components/ArticleGrid.vue";
import { Breadcrumb, BreadcrumbItem } from "view-ui-plus";
import MasterPagination from "@/Components/MasterPagination.vue";

defineProps({
    articles: [],
    comment_count:[]
})
</script>

<template>
    <Head title="Articles" />
    <AuthenticatedLayout :nav-status="true">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('article.lists')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        My Article
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <div class="flex mb-2 ">
            <MasterATab :href="route('article.create')">
                Add Article
            </MasterATab>
        </div>
        <template #sidebar>
                <SidebarLink class="font-bold" :href="route('article.index')" :active="route().current('article.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                    </svg>
                    My Articles
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.lists')" :active="route().current('article.create')">
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
        </template>
        <div class="rounded-xl px-3 py-2 text-sm bg-panel-800 bg-white">
            <main class="mx-auto mt-3 space-y-6">
                <article-grid :articles="articles.data" >
                </article-grid>
            </main>
        </div>
        <div class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="articles.links"></MasterPagination>
        </div>
    </AuthenticatedLayout>
</template>
