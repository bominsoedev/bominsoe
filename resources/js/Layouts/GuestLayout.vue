<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import ToastList from "@/Components/ToastList.vue";
import Sidebar from "@/Components/Sidebar.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    navStatus: {
        type: Boolean
    }
})
</script>

<template>
    <div id="root" class="home-dark">
        <div class="flex-1">
            <div class="fixed inset-0 home-dark"></div>
            <div class="relative rounded-b-[28px]">
                <nav v-if="canLogin" class="z-50 w-full min-w-screen-xl py-4 lg:py-3" style="height: 60px">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('session.dashboard')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard
                    </Link
                    >

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in
                        </Link
                        >

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register
                        </Link
                        >
                    </template>
                </nav>
                <section class="flex min-w-screen-xl justify-center">
                    <ToastList></ToastList>
                    <div class="mb-32 mt-8 w-full max-w-screen-xl px-12 text-gray-400">
                        <div>
                            <div class="mb-8 flex w-full justify-between">
                                <slot name="header"/>
                            </div>
                            <div class="flex">
                                <Sidebar v-if="navStatus">
                                    <slot name="sidebar"/>
                                </Sidebar>
                                <div class="w-full">
                                    <slot/>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
