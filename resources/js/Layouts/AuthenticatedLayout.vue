<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';
import Sidebar from '@/Components/Sidebar.vue'
import ToastList from "@/Components/ToastList.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="fixed inset-0 bg-gray-100 dark:bg-gray-900"></div>
        <div class="relative">
            <ToastList/>
            <nav
                class="flex h-20 w-full min-w-screen-xl justify-center bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                <div class="grid w-full max-w-nav grid-cols-8 items-center gap-x-4 px-5">
                    <div class="col-span-2 flex h-10 w-auto items-center justify-between gap-x-6">
                        <Link :href="route('home')">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                            />
                        </Link>
                        <div class="">
                            <div class="relative">

                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 col-start-3 col-end-7 flex w-full items-center justify-center gap-x-5">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-house-gear text-gray-400" viewBox="0 0 16 16">
                                <path
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                <path
                                    d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                            </svg>
                            Dashboard
                        </NavLink>
                        <NavLink :href="route('article.index')" :active="route().current('article.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-postcard text-gray-400" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                            </svg>
                            Articles
                        </NavLink>
                        <NavLink :href="route('category.index')" :active="route().current('category.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 class="h-4 w-4 text-gray-400">
                                <path fill-rule="evenodd"
                                      d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                                      fill="currentColor"></path>
                            </svg>
                            Categories
                        </NavLink>
                    </div>
                    <div
                        class="relative z-30 col-span-2 flex flex h-10 w-full flex-grow items-center justify-end justify-self-end">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                        <span class="inline-flex rounded-md">

                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                 <div
                                                     class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 mr-2 h-[30px] w-[30px] border-none"
                                                     aria-hidden="true" height="30" width="30">B
                                            </div>
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')"> Dashboard</DropdownLink>
                                <DropdownLink :href="route('article.index')"> Articles</DropdownLink>
                                <DropdownLink :href="route('category.index')"> Categories</DropdownLink>
                                <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </nav>
            <div class="flex min-w-screen-xl justify-center">
                <div class="mb-32 mt-8 w-full max-w-screen-xl px-12 dark:text-gray-400">
                    <div>
                        <!-- Page Heading -->
                        <div class="mb-8 flex w-full justify-between">
                            <slot name="header"/>
                        </div>
                        <!-- Page Content -->
                        <div class="flex">
                            <slot name="sidebar"/>
                            <div class="w-5/6">
                                <div class="">
                                    <slot/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
