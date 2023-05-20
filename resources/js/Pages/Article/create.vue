<template>
    <Head title="Article Create"/>
    <AuthenticatedLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles Settings</h1>
            <Breadcrumb>
                <BreadcrumbItem :to="route('session.dashboard')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Dashboard
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem :to="route('article.index')">
                    <span class="text-gray-50 dark:text-white/75 dark:hover:text-sky-500 duration-300">
                        Articles
                    </span>
                </BreadcrumbItem>
                <BreadcrumbItem>
                    <span class="text-gray-50 dark:text-white/75 duration-300">
                        Article Create
                    </span>
                </BreadcrumbItem>
            </Breadcrumb>
        </template>
        <template #sidebar>
                <SidebarLink class="font-bold" :href="route('article.index')"
                             :active="route().current('article.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Articles
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.lists')"
                             :active="route().current('article.lists')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    My Articles List
                </SidebarLink>
                <SidebarLink class="font-bold" :href="route('article.create')"
                             :active="route().current('article.create')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-postcard mr-4 text-gray-400" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
                    </svg>
                    Articles Create
                </SidebarLink>
        </template>
        <form @submit.prevent="submit" method="post">
            <div class="rounded-lg px-6 py-4 text-sm bg-panel-800">
                <div class="flex items-center justify-between">
                    <h5 class="bominsoe-h5 text-gray-400">Article Create</h5>
                </div>
                <div class="flex">
                    <div class="mt-4 flex w-1/2 flex-col mr-2">
                        <InputLabel for="article_title" value="Article Title"/>
                        <div class="mt-1 flex flex-col">
                            <TextInput id="article_title" v-model="form.article_title" type="text"
                                       class="mt-1 block w-full"
                                       autocomplete="article_title"
                                       placeholder="Aa"
                            />
                            <InputError class="mt-2" :message="form.errors.article_title"/>
                        </div>
                    </div>
                    <div class="mt-4 flex w-1/2 flex-col">
                        <InputLabel for="article_category" value="Category"/>
                        <div class="mt-2 flex flex-col">
                            <Select v-model="form.article_category_id" multiple>
                                <Option v-for="(category, i) in categories" :value="category.id" :key="i">
                                    {{ category.name }}
                                </Option>
                            </Select>
                        </div>
                        <InputError class="mt-2" :message="form.errors.article_category_id"/>
                    </div>
                </div>
                <div class="my-3">
                    <InputLabel for="article_category" value="Description"/>
                    <div class="mt-1">
                    <textarea
                        v-model="form.description"
                        class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-sm focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md"
                        id="description"
                        rows="1"
                        placeholder="Aa"></textarea>
                    </div>
                    <InputError class="mt-2" :message="form.errors.description"/>
                </div>
                <div class="">
                    <QuillEditor toolbar="full"
                                 ref="myQuillEditor"
                                 contentType="html"
                                 v-model:content="form.article_body"/>
                    <InputError class="mt-2" :message="form.errors.article_body"/>
                </div>
                <div class="mt-3">
                    <div class="flex items-center justify-center w-1/2">
                        <label for="attachment"
                               class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                </p>
                            </div>
                            <input @click="addAttchment" id="attachment" type="file" class="hidden"
                                   @input="form.attachment = $event.target.files[0]"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-panel-800 p-3 rounded-lg text-end">
                <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Article
                </primary-button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SidebarLink from "@/Components/SidebarLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Breadcrumb, BreadcrumbItem, Form, Upload} from "view-ui-plus";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css'
import { mapGetters } from 'vuex'

var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],
    ['link', 'image'],
    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
];
export default {
    components: {
        AuthenticatedLayout,
        SidebarLink,
        Sidebar,
        Head,
        InputError,
        TextInput,
        InputLabel,
        PrimaryButton,
        Breadcrumb,
        BreadcrumbItem,
        Upload,
        QuillEditor
    },
    props: {
        categories: [],
    },
    data: function () {
        return {
            options:{
                debug: 'info',
                placeholder: 'Aa',
                modules:{
                    toolbar: toolbarOptions,
                },
                readOnly: false,
                theme: 'snow',
            },
            mounting: false,
            form: new useForm({
                article_title: '',
                article_category_id: [],
                description: '',
                article_body: '',
                editor: ClassicEditor,
                editorConfig: {},
                attachment: null
            }),
        }
    },
    watch: {
        content (val) {
            if (!this.mounting) {
                this.$store.commit('setDelta', this.$refs.myQuillEditor.quill.getContents())
            }
            this.$store.commit('setContent', val)
            this.mounting = false
        }
    },
    methods: {
        submit() {
            this.form.post(route('article.store')
                , {
                    onSuccess: () => this.form.reset('article_body', 'article_title', 'article_category_id', 'description'),
                }
            );
        },
    },
    computed: {
        ...mapGetters(['delta', 'contents'])
    },
    mounted () {
        this.mounting = true
        if (!this.form.article_body && this.form.article_body) {
            this.form.article_body = this.for.article_body
        }
    }
}
</script>

<style>
.ql-editor {
    height: 500px;
}
.ivu-upload-drag {
    --tw-bg-opacity: 1;
    background-color: rgba(17 24 39 / var(--tw-bg-opacity));
    border: none;
}

.ivu-upload-drag:hover {
    border: none;
}

.ivu-select-selection {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.ivu-select-selection {
    border: rgba(65, 132, 228, 0.4);
}

.ivu-select-dropdown {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.ivu-select-item:hover {
    background-color: rgba(65, 132, 228, 0.4);
    color: white;
    transition: 500ms;
    border-radius: 2px;
}
.ivu-tag {
    display: inline-block;
    height: 22px;
    line-height: 22px;
    margin: 2px 4px 2px 0;
    padding: 0 8px;
    border: 1px solid rgba(65, 132, 228, 0.4);;
    border-radius: 3px;
    --tw-text-opacity: 1;
    background-color: rgba(50, 138, 241, .13/var(--tw-text-opacity));
    font-size: 12px;
    vertical-align: middle;
    opacity: 1;
    overflow: hidden;
}
.ivu-tag-text{
    color: white;
}
.ivu-select-multiple .ivu-select-item-selected {
    color: rgba(45,140,240,.9);
    background: rgba(65, 132, 228, 0.4);
}
.ivu-tag .ivu-icon-ios-close {
    display: inline-block;
    font-size: 14px;
    -webkit-transform: scale(1.42857143) rotate(0);
    -ms-transform: scale(1.42857143) rotate(0);
    transform: scale(1.42857143) rotate(0);
    cursor: pointer;
    margin-left: 2px;
    color: white;
    opacity: .66;
    position: relative;
    top: -1px;
}
.ivu-select-multiple .ivu-select-item-focus, .ivu-select-multiple .ivu-select-item-selected:hover{
    background-color: rgba(65, 132, 228, 0.4);
}
.ivu-select-multiple .ivu-select-item-focus, .ivu-select-multiple .ivu-select-item-selected:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}
.ck-editor__editable {
    min-height: 300px;
    border-bottom-left-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}
</style>
