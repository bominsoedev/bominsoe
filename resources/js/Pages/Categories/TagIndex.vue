<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from '@inertiajs/vue3';
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import MasterTable from "@/Components/MasterTable.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import moment from "moment-timezone";
import {initFlowbite} from "flowbite";
import {onMounted} from "vue";
import DangerButton from "@/Components/DangerButton.vue";


const props = defineProps({
    tags: [],
})

const form = useForm({
    tag: '',
})
onMounted(() => {
    initFlowbite();
})
const submit = () => {
    form.post(route('tag.store'), {
        onFinish: () => form.reset('tag'),
    });
};

const ths = [
    'ID',
    'Name',
    'Slug',
    'When',
    'Upload By',
    'Control'
]

</script>

<template>
    <Head title="Tags"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tags Settings</h1>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('category.index')"
                             :active="route().current('category.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-bezier2 mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                    </svg>
                    My Categories
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('tag.index')"
                             :active="route().current('tag.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         class="h-4 w-4 mr-4 text-gray-400">
                        <path fill-rule="evenodd"
                              d="M20.59 3.29l.12.12a1.05 1.05 0 0 1 .29.71v7.95a2 2 0 0 1-.59 1.42l-7.22 7.22a1 1 0 0 1-1.41 0l-8.49-8.49a1 1 0 0 1 0-1.41l7.22-7.22A2 2 0 0 1 11.93 3h7.95a1.05 1.05 0 0 1 .71.29zM14 8a2 2 0 0 0 3.414 1.414A2 2 0 0 0 16 6a2 2 0 0 0-2 2z"
                              fill="currentColor">
                        </path>
                    </svg>
                    My Tags
                </SidebarLink>
            </Sidebar>
        </template>
        <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            <div class="flex items-center justify-between">
                <h5 class="bominsoe-h5 text-gray-400">Tag List</h5>
            </div>
            <form @submit.prevent="submit" method="post">
                <div class="mt-4 pl-2">
                    <InputLabel for="tag" value="Tag Name"/>
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput
                                id="tag"
                                v-model="form.tag"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="tag"
                            />
                            <InputError class="mt-2"/>
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Add Tag
                        </primary-button>
                    </div>
                </div>
            </form>
            <MasterTable
                :table_head="ths">
                <tr v-for="tag in tags" :key="tag.id"
                    class="h-12 divide-y divide-gray-100 dark:divide-gray-700">
                    <td>{{ tag.id }}</td>
                    <td>{{ tag.name }}</td>
                    <td>{{ tag.slug }}</td>
                    <td class="w-32">{{ moment(tag.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ tag.user.username }}</td>
                    <td class="text-center space-x-2">
                        <button :data-modal-target="tag.uuid"
                                :data-modal-toggle="tag.uuid"
                                class="inline-block text-white rounded-lg text-sm text-center"
                                type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        <button :data-modal-target="tag.slug"
                                :data-modal-toggle="tag.slug"
                                class="inline-block text-white rounded-lg text-sm text-center"
                                type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash hover:text-red-600 duration-300" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                        <div :id="tag.uuid" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            :data-modal-hide="tag.uuid">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
                                        <div class="flex items-center justify-between">
                                            <h5 class="bominsoe-h5 text-gray-400">Tag Update</h5>
                                        </div>
                                        <form @submit.prevent="form.put(route('tag.update',tag))">
                                            <div class="mt-4 pl-2">
                                                <InputLabel for="tag" value="Tag Name"/>
                                                <div class="mt-1">
                                                    <div class="my-2">
                                                        <TextInput
                                                            id="tag"
                                                            v-model="tag.name"
                                                            type="text"
                                                            class="mt-1 block w-full"
                                                            autocomplete="tag"
                                                        />
                                                        <InputError class="mt-2"/>
                                                    </div>
                                                    <primary-button :class="{ 'opacity-25': form.processing }"
                                                                    :disabled="form.processing">
                                                        Update Tag
                                                    </primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :id="tag.slug" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold">
                                            Tag Destroy
                                        </h3>
                                        <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                :data-modal-hide="tag.slug">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            Do you really want to destroy this tag?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <form @submit="form.delete(route('tag.destroy',tag))"
                                              class="inline-block">
                                            <danger-button class="bg-red-800">
                                                Destroy
                                            </danger-button>
                                        </form>
                                        <primary-button :data-modal-hide="tag.slug">
                                            Close
                                        </primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </MasterTable>
        </div>
    </AuthenticatedLayout>
</template>