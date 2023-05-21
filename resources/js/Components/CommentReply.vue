<template>
            <div  class="vfm vfm--inset vfm--fixed vfm--prevent-none"
                  height="auto"
                 data-v-2836fdb5=""
                  style="z-index: 1000;">
                <div class="vfm__container vfm--absolute vfm--inset vfm--outline-none flex mx-auto dark"
                     aria-expanded="true"
                     role="dialog"
                     aria-modal="true"
                     tabindex="-1"
                     data-v-2836fdb5=""
                     style="">
                    <div class="vfm__content mx-auto transition-transform flex-1 rounded-none bg-white dark:bg-[#1c3150] dark:text-white md:rounded-t-2xl max-h-screen mt-auto overflow-auto flex flex-col w-full md:w-3/4 md:max-h-80 transition-transform vfm--prevent-auto"
                        data-v-2836fdb5="" style="box-shadow: rgba(27, 33, 58, 0.4) 0px 20px 60px -2px; max-width: 800px;">
                        <div class="flex py-4 px-6 md:px-8" data-v-2836fdb5-s="">
                            <div class="flex-1" data-v-2836fdb5-s="">
                                <form v-if="this.isEdit" @submit.prevent="update(comment)" class="text-sm" data-v-2836fdb5-s="">
                                    <div class="mb-2 flex items-center" data-v-2836fdb5-s="">
                                        <svg height="16px" viewBox="0 0 16 16" width="16px"
                                             class="mr-2 fill-current text-grey-800" data-v-2836fdb5-s="">
                                            <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"
                                               data-v-2836fdb5-s="">
                                                <g id="Group" class="fill-current"
                                                   transform="translate(0.000000, -336.000000)"
                                                   data-v-2836fdb5-s="">
                                                    <path
                                                        d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344"
                                                        data-v-2836fdb5-s=""></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <p class="font-semibold" data-v-2836fdb5-s="">
                                            Edit
                                        </p>
                                    </div>
                                    <div class="control" data-v-2836fdb5-s="">
                                    <textarea
                                        id="body"
                                        name="body"
                                        class="textarea mb-1 overflow-auto border-l-0 border-r-0 px-0 py-4 text-sm dark:border-sky-500 dark:bg-transparent dark:font-medium dark:text-white"
                                        data-autosize="" required="" data-v-2836fdb5-s=""
                                        style="min-height: 150px; max-height: 45vh; overflow: hidden; overflow-wrap: break-word; resize: none; height: 150px;"
                                        data-tribute="true" v-model="this.form.comment"></textarea>
                                    </div>
                                    <div class="flex w-full justify-end space-x-4" data-v-2836fdb5-s="">
                                        <div class="" data-v-2836fdb5-s="">
                                            <button @click.prevent="close"
                                                    class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-3 py-1 duration-300"
                                                    data-v-2836fdb5-s="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13"
                                                     fill="currentColor" class="bi bi-x-circle mr-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                                Cancel
                                            </button>
                                        </div>
                                        <div class="" data-v-2836fdb5-s="">
                                            <button
                                                class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-3 py-1 duration-300"
                                                data-v-2836fdb5-s="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13"
                                                     fill="currentColor" class="bi bi-check2-circle mr-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                    <path
                                                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                </svg>
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form v-else @submit.prevent="replies(comment)" class="text-sm" data-v-2836fdb5-s="">
                                    <div class="mb-2 flex items-center" data-v-2836fdb5-s="">
                                        <svg height="16px" viewBox="0 0 16 16" width="16px"
                                             class="mr-2 fill-current text-grey-800" data-v-2836fdb5-s="">
                                            <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"
                                               data-v-2836fdb5-s="">
                                                <g id="Group" class="fill-current"
                                                   transform="translate(0.000000, -336.000000)"
                                                   data-v-2836fdb5-s="">
                                                    <path
                                                        d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344"
                                                        data-v-2836fdb5-s=""></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <p class="font-semibold" data-v-2836fdb5-s="">
                                            Reply to
                                            <strong class="uppercase text-blue font-extrabold" data-v-2836fdb5-s="">
                                                {{ comment.author.username }}
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="control" data-v-2836fdb5-s="">
                                    <textarea
                                        id="body"
                                        name="body"
                                        class="textarea mb-1 overflow-auto border-l-0 border-r-0 px-0 py-4 text-sm dark:border-sky-500 dark:bg-transparent dark:font-medium dark:text-white"
                                        data-autosize="" required="" data-v-2836fdb5-s=""
                                        style="min-height: 150px; max-height: 45vh; overflow: hidden; overflow-wrap: break-word; resize: none; height: 150px;"
                                        data-tribute="true" v-model="this.form.replies"></textarea>
                                    </div>
                                    <div class="flex w-full justify-end space-x-4" data-v-2836fdb5-s="">
                                        <div class="" data-v-2836fdb5-s="">
                                            <button @click.prevent="close"
                                                    class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                                    data-v-2836fdb5-s="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13"
                                                     fill="currentColor" class="bi bi-x-circle mr-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                     class="bi bi-send mr-1" viewBox="0 0 16 16">
                                                    <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                                          d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                                </svg>
                                                Post
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CommentReply",
    props: {
        comment: {},
        isEdit: false
    },
    data() {
        return {
            form: new useForm({
                comment: this.comment.body,
                replies: "@" + this.comment.author.username
            })
        }
    },
    methods: {
        close() {
            this.$emit("isOpen")
        },
        update(comment) {
            this.form.put(route('comment.update', comment), {
                onSuccess: () => this.form.reset(),
            });
            this.close();
        },
        replies(comment) {
            this.form.post(route('comment.replies', comment), {
                onSuccess: () => this.form.reset(),
            });
            this.close();
        }
    }
}
</script>

<style scoped>

</style>
