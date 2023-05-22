<template>
    <div v-if="comment.body" class="responses">
        <div class="reply-with-responses">
            <article
                class="p-3 rounded-xl forum-comment transition-colors duration-300 dark bg-blue/7 hover:bg-blue/13 text-white">
                <div>
                    <div class="flex space-x-2">
                        <div class="mr-2">
                            <img :src="'/storage/ProfileAttachment/' + comment.author.photo" alt=""
                                 class="lazy object-cover lazyloaded rounded-full"
                                 loading="lazy" style="height: 28px" width="30">
                        </div>
                        <div class="bg-panel-800 rounded-lg timeline-comment p-2 w-full">
                            <h3 class="text-lg font-bold">{{ comment.author.username }}</h3>
                            <div class="my-4" v-html="comment.body">
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-2 ml-12">
                        <div class="">
                            <button
                                class="inline-flex text-xs mr-2 rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-blue-10 dark:bg-blue/13 dark:text-white"
                                @click="replies()">
                                <svg class="bi bi-reply mr-1" fill="currentColor" height="13" viewBox="0 0 16 16"
                                     width="12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
                                </svg>
                                Reply
                            </button>
                            <button
                                class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20"
                                type="button"
                                @click="openComment()">
                                <svg class="bi bi-pencil-square mr-1" fill="currentColor" height="13"
                                     viewBox="0 0 16 16"
                                     width="12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                        fill="#78909C" fill-rule="evenodd" stroke="#78909C"
                                        stroke-width=".5"/>
                                    <path
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                        fill="#78909C" fill-rule="evenodd" stroke="#78909C"
                                        stroke-width=".5"/>
                                </svg>
                                Edit
                            </button>
                        </div>
                        <div class="text-center">
                            <p class="text-xs ">
                                <time>{{
                                        moment().utc(comment.created_at).local().startOf('seconds').fromNow()
                                    }}
                                </time>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
            <div class="responses">
                <ReplytoReplies v-for="comment in comment.replies" :key="comment.uuid"
                                :comment="comment"></ReplytoReplies>
            </div>
        </div>
    </div>
    <div v-if="isOpen">
        <CommentReply :comment="comment" :is-edit="isEdit" @isOpen="this.isOpen = false"></CommentReply>
    </div>
</template>

<script>
import moment from "moment-timezone";
import {useForm} from "@inertiajs/vue3";
import CommentReply from "@/Components/CommentReply.vue";
import ReplytoReplies from "@/Components/ReplytoReplies.vue";


export default {
    components: {ReplytoReplies, CommentReply},
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
        moment: function () {
            return moment();
        }
    }

}


</script>

<style></style>
