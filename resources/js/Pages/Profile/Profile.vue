<template>
    <Head title="Profile"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Account Settings</h1>
        </template>
        <template #sidebar>
            <SidebarLink :active="route().current('profile.information', $page.props.auth.user)"
                         :href="route('profile.information', $page.props.auth.user)"
                         class="font-bold">
                <svg class="bi bi-person text-gray-400 mr-3" fill="currentColor" height="16" viewBox="0 0 16 16"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
                Profile
            </SidebarLink>
            <SidebarLink :active="route().current('profile.edit', $page.props.auth.user)"
                         :href="route('profile.edit', $page.props.auth.user)"
                         class="font-bold">
                <svg class="mr-3 h-4 w-4 text-gray-400" fill="none" height="16" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24"
                     width="16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                    </path>
                </svg>
                Authentication
            </SidebarLink>
        </template>
        <div v-if="showFileUpload" class=" flex justify-center absolute duration-300 w-full z-[1000]">
            <form class="w-full" @submit.prevent="upload_profile($page.props.auth.user)">
                <div class="rounded-lg shadow-xl dark:bg-gray-800 lg:w-1/2">
                    <div class="m-4  py-6 px-4 rounded-xl">
                        <label class="inline-block mb-2 text-white">Upload
                            Image(jpg,png,svg,jpeg)</label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col w-full h-32 duration-300 border border-sky-500 hover:border-sky-800  rounded-xl hover:bg-panel-800">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    PROFILE PHOTO
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                        Select a photo</p>
                                </div>
                                <input class="opacity-0" type="file" @change="onChange"
                                       @input="form.profile_photo = $event.target.files[0]"/>
                            </label>
                        </div>
                    </div>
                    <div class="flex w-full justify-start px-5 pb-5 space-x-4" data-v-2836fdb5-s="">
                        <div class="" data-v-2836fdb5-s="">
                            <button
                                class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                data-v-2836fdb5-s=""
                                @click="closeFile()">
                                <svg class="bi bi-x-circle mr-1" fill="currentColor" height="13" viewBox="0 0 16 16"
                                     width="12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Cancel
                            </button>
                        </div>
                        <div class="" data-v-2836fdb5-s="">
                            <button
                                class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                data-v-2836fdb5-s="">
                                <svg class="bi bi-check2-circle mr-1" fill="currentColor" height="13"
                                     viewBox="0 0 16 16"
                                     width="12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path
                                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg>
                                Done
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="rounded-lg px-6 py-4 text-sm bg-panel-800 bg-white">
            <div class="h-72 overflow-hidden relative p-3 bg-transparent rounded">
                <img alt="" class="lazy h-full w-full object-cover lazyloaded rounded-xl duration-300 ease-in-out hover:opacity-100 opacity-90 transition" loading="lazy"
                     src="/Images/Icon/SHARING.svg"
                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                <button class="rounded border-2 bg-white text-black p-2 absolute right-3 bottom-3" type="button"
                        @click="goFile()">
                    <svg class="bi bi-camera inline-flex" fill="currentColor" height="16" viewBox="0 0 16 16"
                         width="16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                        <path
                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                    Edit Cover Photo
                </button>
            </div>
            <div class="flex p-3 items-center gap-5 z-50 relative pl-7">
                <div class=" inline-block relative">
                    <img v-if="$page.props.auth.user.photo"
                         id="show"
                         :src="'/storage/ProfileAttachment/' + $page.props.auth.user.photo"
                         alt=""
                         class="w-32 h-32 rounded-full ring-2 -mt-10 ring-sky-500 object-cover duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                         loading="lazy"
                         @click="goFile()">
                    <img v-else
                         id="show"
                         alt=""
                         class="w-32 h-32 rounded-full ring-2 -mt-10 ring-sky-500 object-cover duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                         loading="lazy"
                         src="/Images/Icon/S.svg"
                         @click="goFile()">
                </div>
                <div class="" style="width: 30rem;">
                    <h1 class="text-3xl font-extrabold my-3 text-white flex space-x-1 items-center">
                        <span>
                            {{ $page.props.auth.user.username }}
                        </span>
                        <span class="text-xl font-thin inline-flex">( {{ $page.props.auth.user.nickname }} )
                        <svg
                            class="bi bi-patch-check-fill fill-blue-600 stroke-white dark:stroke-sky-300 stroke-1 ml-2"
                            height="13" viewBox="0 0 16 16"
                            width="12"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Verified account</title>
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                        </span>
                    </h1>
                    <p class="text-gray-500">" {{ $page.props.auth.user.bio }} "</p>
                </div>
            </div>
        </div>
        <!-- Photo Upload Modal -->
    </AuthenticatedLayout>
</template>
<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Sidebar from "@/Components/Sidebar.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import {Head, useForm} from "@inertiajs/vue3";
import auth from "view-ui-plus/src/components/auth";

export default {
    computed: {
        auth() {
            return auth
        }
    },
    components: {AuthenticatedLayout, Sidebar, SidebarLink, Head},
    data() {
        return {
            showFileUpload: false,
            image: null,
            form: new useForm({
                profile_photo: null,
                profile_cover: null
            })

        }
    },

    methods: {
        goFile() {
            this.showFileUpload = true;
        },

        closeFile() {
            this.showFileUpload = false;
        },
        onChange(e) {
            console.log("selectFiles", e.target.file[0])
        },
        upload_profile(param) {
            this.form.post(route('profile.upload_profile', param)
                , {
                    onSuccess: () => this.form.reset(),
                }
            );
            this.closeFile();
        }
    }
}

</script>

<style lang="scss" scoped></style>
