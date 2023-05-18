<template>
    <x-pane class="bg-gray-100 mt-3">
        <article class="mt-5 p-3 rounded-xl">
            <div>
                <div class="flex space-x-2">
                    <div class="mr-2">
                        <img loading="lazy" :src="'/storage/ArticleAttachment/' + comment.photo.unique_name" alt=""
                             width="30" class="lazy object-cover lazyloaded rounded-full" style="height: 28px">
                    </div>
                    <div class="bg-panel-800 rounded-lg w-full timeline-comment p-2 border border-gray-600">
                        <h3 class="text-lg font-bold">{{ comment.author.username }}</h3>
                        <div class="my-4" v-html="comment.body">
                        </div>
                        <div class="flex justify-between">
                            <div class="">
                                <button @click="openComment()" type="button"
                                        class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="currentColor"
                                         class="bi bi-pencil-square mr-1" viewBox="0 0 16 16">
                                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                              d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </article>
        <div v-if="isOpen">
            <CommentReply :comment="comment" :is-edit="isEdit" @isOpen="this.isOpen = false"></CommentReply>
        </div>
    </x-pane>
</template>

<script>
import moment from "moment-timezone";
import {useForm} from "@inertiajs/vue3";
import CommentReply from "@/Components/CommentReply.vue";


export default {
    components: {CommentReply},
    props: {
        comment: {},
    },
    data() {
        return {
            isEdit: false,
            isOpen: false,
            form: new useForm({
                comment: this.comment.body
            })
        }
    },
    methods: {
        openComment() {
            this.isOpen = true;
            this.isEdit = true;
        },
        replies() {
            this.isOpen = true;
            this.isEdit = false;
        },
    }

}


</script>

<style></style>
