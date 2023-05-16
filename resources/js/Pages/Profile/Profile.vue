<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Account Settings</h1>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('profile.edit', $page.props.auth.user)"
                    :active="route().current('profile.edit', $page.props.auth.user)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-4 h-4 w-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z">
                        </path>
                    </svg>
                    Authentication
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('profile.information', $page.props.auth.user)"
                    :active="route().current('profile.information', $page.props.auth.user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person text-sky-700 mr-3" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    Profile
                </SidebarLink>
            </Sidebar>
        </template>

        <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">

            <div class=" h-72 overflow-hidden relative">
                <img src="/storage/ArticleAttachment/64638e88e027d_articleAttachmentPhoto_caption.jpg" alt="" loading="lazy"
                    class="rounded">
                <button class="rounded border-2 bg-white text-black p-2 absolute right-3 bottom-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-camera inline-flex" viewBox="0 0 16 16">
                        <path
                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                        <path
                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                    </svg>
                    Edit Cover Photo</button>
            </div>
            <div class="flex p-3 items-center gap-5 z-50 relative pl-7">
                <img src="/storage/ArticleAttachment/64638e88e027d_articleAttachmentPhoto_caption.jpg" alt="" loading="lazy"
                    class=" w-32 h-32 rounded-full ring -mt-10 ring-sky-500">

                <div class="" style="width: 30rem;">
                    <h1 class="text-2xl font-extrabold">Chan Myae </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ratione officia quis cupiditate
                        neque omnis aliquam dolorem facere.</p>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Sidebar from "@/Components/Sidebar.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import { Head } from "@inertiajs/vue3";




</script>

<style lang="scss" scoped></style>
