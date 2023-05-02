<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile"/>

    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Account Settings</h1>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('profile.edit')" :active="route().current('profile.edit')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="mr-4 h-4 w-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                    </svg>
                    Authentication
                </SidebarLink>
            </Sidebar>
        </template>
        <div class="">
            <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                />
            </div>

            <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white mt-4">
                <UpdatePasswordForm/>
            </div>

            <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white mt-4">
                <DeleteUserForm/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
