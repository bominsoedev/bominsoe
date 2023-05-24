<script setup>
import {Head} from '@inertiajs/vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ToastList from "@/Components/ToastList.vue";
import Sidebar from "@/Components/Sidebar.vue";
import ArticleGrid from "@/Components/ArticleGrid.vue";
import MasterPagination from "@/Components/MasterPagination.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    articles: {
        type: Object
    },
    navStatus: {
        type: Boolean
    }
});
</script>

<template>
    <Head title="Home"/>
    <GuestLayout :can-login="canLogin" :can-register="canRegister">
        <template #header>
        </template>
        <div class="rounded-xl px-3 py-2 text-sm border border-gray-800">
            <main class="mx-auto space-y-6">
                <article-grid :articles="articles.data" >
                </article-grid>
            </main>
        </div>
        <div class="mt-3 bg-panel-800 px-4 rounded-xl py-3">
            <MasterPagination :links="articles.links"></MasterPagination>
        </div>
    </GuestLayout>
</template>

<style>

</style>
