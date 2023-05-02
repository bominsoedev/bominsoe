<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Sidebar from '@/Components/Sidebar.vue'
import SidebarLink from "@/Components/SidebarLink.vue";
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" href="/user-profile/authentication" :active="route().current('home')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="mr-4 h-4 w-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                    </svg>
                    My Article
                </SidebarLink>
            </Sidebar>
        </template>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
        <div class="rounded-lg mb-3 px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            HELLO
        </div>
    </AuthenticatedLayout>
</template>
