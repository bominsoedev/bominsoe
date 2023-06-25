<template>
    <Head />
    <AuthenticatedLayout :classes="'min-w-screen-xl'" :nav-status="ture">
        <main class="min-w-4xl">
            <div
                class="container mx-auto flex flex-col flex-col-reverse justify-between md:flex-row lg:gap-x-10"
            >
                <div class="">
                    <div class="text-center">
                        <button
                            aria-controls="drawer-bottom-example"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            data-drawer-placement="bottom"
                            data-drawer-show="drawer-bottom-example"
                            data-drawer-target="drawer-bottom-example"
                            type="button"
                        >
                            Show bottom drawer
                        </button>
                    </div>

                    <!-- drawer component -->
                    <div
                        id="drawer-bottom-example"
                        aria-labelledby="drawer-bottom-label"
                        class="fixed forum-comment bottom-0 left-0 right-0 z-[100] w-8/12 mx-auto p-4 rounded-lg overflow-y-auto transition-transform bg-panel-700 translate-y-full"
                        tabindex="-1"
                    >
                        <input
                            id="title"
                            class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Apple Keynote"
                            required
                            type="text"
                        />
                        <button
                            aria-controls="drawer-bottom-example"
                            class="ml-auto text-2xs px-3 py-1 absolute top-2.5 right-2.5 inline-flex items-center rounded-xl bg-panel-800 hover:bg-gray-800 duration-300"
                            data-drawer-hide="drawer-bottom-example"
                            type="button"
                        >
                            <span class="">close</span>
                        </button>
                        <!--                        <button-->
                        <!--                            aria-controls="drawer-bottom-example"-->
                        <!--                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"-->
                        <!--                            data-drawer-hide="drawer-bottom-example"-->
                        <!--                            type="button"-->
                        <!--                        >-->
                        <!--                            <svg-->
                        <!--                                aria-hidden="true"-->
                        <!--                                class="w-5 h-5"-->
                        <!--                                fill="currentColor"-->
                        <!--                                viewBox="0 0 20 20"-->
                        <!--                                xmlns="http://www.w3.org/2000/svg"-->
                        <!--                            >-->
                        <!--                                <path-->
                        <!--                                    clip-rule="evenodd"-->
                        <!--                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"-->
                        <!--                                    fill-rule="evenodd"-->
                        <!--                                ></path>-->
                        <!--                            </svg>-->
                        <!--                            <span class="sr-only">Close menu</span>-->
                        <!--                        </button>-->
                        <form action="#" class="mb-6">
                            <div class="mb-6">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="description"
                                    >Description</label
                                >
                                <textarea
                                    id="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write event description..."
                                    rows="4"
                                ></textarea>
                            </div>
                            <div class="relative mb-6">
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                >
                                    <svg
                                        aria-hidden="true"
                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            clip-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            fill-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                    datepicker=""
                                    datepicker-autohide
                                    datepicker-buttons=""
                                    placeholder="Select date"
                                    type="text"
                                />
                            </div>
                            <div class="mb-4">
                                <label
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                                    for="guests"
                                    >Invite guests</label
                                >
                                <div class="relative">
                                    <input
                                        id="guests"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Add guest email"
                                        required
                                        type="search"
                                    />
                                    <button
                                        class="absolute inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg right-2 bottom-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="w-4 h-4 mr-1"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                            ></path>
                                        </svg>
                                        Add
                                    </button>
                                </div>
                            </div>
                            <div class="flex mb-4 -space-x-4">
                                <img
                                    alt=""
                                    class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-5.jpg"
                                />
                                <img
                                    alt=""
                                    class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-2.jpg"
                                />
                                <img
                                    alt=""
                                    class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-3.jpg"
                                />
                                <img
                                    alt=""
                                    class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                    src="/docs/images/people/profile-picture-4.jpg"
                                />
                            </div>
                            <button
                                class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                type="submit"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="w-5 h-5 mr-2"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        clip-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        fill-rule="evenodd"
                                    ></path>
                                </svg>
                                Create event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </AuthenticatedLayout>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import BlueBadgeIcon from '@/Components/BlueBadgeIcon.vue';
import { Button } from 'view-ui-plus';
import moment from 'moment-timezone';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    methods: { moment },
    components: {
        AuthenticatedLayout,
        Button,

        BlueBadgeIcon,

        Head,
    },
};
</script>

<style lang="scss" scoped></style>
