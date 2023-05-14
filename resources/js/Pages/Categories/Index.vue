<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, router, useForm} from '@inertiajs/vue3';
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

export default {
    components: {
        AuthenticatedLayout,
        Head,
        SidebarLink,
        Sidebar,
        MasterTable,
        PrimaryButton,
        InputError,
        InputLabel,
        TextInput,
        DangerButton, moment
    },
    props: {
        categories: [],
    },
    data: function () {
        return {
            editMode: false,
            isOpen: false,
            ths: [
                'ID',
                'Name',
                'Slug',
                'Upload By',
                'Control'
            ],
            form: useForm({
                category: '',
            })
        }
    },
    methods: {
        edit(category) {
            this.form.get(route('category.edit', category))
        },
        submit() {
            this.form.post(route('category.store'), {
                onFinish: () => form.reset('category'),
            });
        }
    }


}
onMounted(() => {
    initFlowbite();
})

</script>

<template>
    <Head title="Categories"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Categories Settings</h1>
        </template>
        <template #sidebar>
            <Sidebar>
                <SidebarLink class="font-bold" :href="route('category.index')"
                             :active="route().current('category.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Categories
                </SidebarLink>
            </Sidebar>
        </template>
        <div class="rounded-lg px-6 py-4 text-sm dark:bg-gray-800 bg-white">
            <div class="flex items-center justify-between">
                <h5 class="bominsoe-h5 text-gray-400">Category List</h5>
            </div>
            <form @submit.prevent="submit" method="post">
                <div class="mt-4 pl-2">
                    <InputLabel for="category" value="Category Name"/>
                    <div class="mt-1">
                        <div class="my-2">
                            <TextInput
                                id="category"
                                v-model="form.category"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="category"
                            />
                            <InputError class="mt-2"/>
                        </div>
                        <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Add Category
                        </primary-button>
                    </div>
                </div>
            </form>
            <MasterTable
                :table_head="ths">
                <tr v-for="category in categories" :key="category.id"
                    class="h-12 divide-y divide-gray-100 dark:divide-gray-700">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.slug }}</td>
                    <!--                    <td class="w-32">{{ moment(category.created_at).format("DD-MM-YYYY") }}</td>-->
                    <td>{{ category.user.username }}</td>
                    <td class="text-center space-x-2">
                        <a :href="route('category.edit',category)"
                           class="inline-block text-white rounded-lg text-sm text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square text-gray-400 hover:text-sky-500 duration-300"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <button :data-modal-target="category.slug"
                                :data-modal-toggle="category.slug"
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
                        <div :id="category.uuid" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            :data-modal-hide="category.uuid">
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
                                            <h5 class="bominsoe-h5 text-gray-400">Category Update</h5>
                                        </div>
                                        <form>
                                            <div class="mt-4 pl-2">
                                                <div class="mt-1">
                                                    <div class="my-2">
                                                        <TextInput
                                                            id="category"
                                                            v-model="category.name"
                                                            type="text"
                                                            class="mt-1 block w-full"
                                                            autocomplete="category"
                                                        />
                                                        <InputError class="mt-2"/>
                                                    </div>
                                                    <primary-button
                                                        @click.prevent="update(category)"
                                                        :class="{ 'opacity-25': form.processing }"
                                                        :disabled="form.processing">
                                                        Update Category
                                                    </primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :id="category.slug" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold">
                                            Category Destroy
                                        </h3>
                                        <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                :data-modal-hide="category.slug">
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
                                            Do you really want to destroy this category?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <form @submit="form.delete(route('category.destroy',category))"
                                              class="inline-block">
                                            <danger-button class="bg-red-800">
                                                Destroy
                                            </danger-button>
                                        </form>
                                        <primary-button :data-modal-hide="category.slug">
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
