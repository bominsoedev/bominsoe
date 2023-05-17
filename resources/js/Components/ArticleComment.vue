<template>
    <x-pane class="bg-gray-100 mt-3">
        <article class="mt-5">
            <div>
                <div class="flex space-x-2">
                    <div class="mr-2">
                        <img loading="lazy" :src="'/storage/ArticleAttachment/' + comment.photo.unique_name" alt=""
                            width="30" class="lazy object-cover lazyloaded rounded-full" style="height: 28px">
                    </div>
                    <div class=" bg-panel-800 p-3 rounded-lg w-full">
                        <h3 class="text-lg font-bold">{{ comment.author.username }}</h3>
                        <div class="my-4">
                            <p>
                                {{ comment.body }}
                            </p>
                        </div>
                        <div class="flex justify-between">
                            <div class="">
                                <a href=""
                                    class="inline-flex text-xs mr-2 rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-blue/15">
                                    <svg width="12" height="13" viewBox="0 0 12 13" class="mr-1">
                                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                            d="M6.96 1.877L4.34.542l.435 1.413a5.196 5.196 0 0 0-3.161 2.64C.32 7.133 1.267 10.2 3.73 11.455s5.5.218 6.794-2.32a5.203 5.203 0 0 0 .316-3.989l-1.145.369c.338.955.29 2.087-.22 3.086-.99 1.944-3.308 2.735-5.194 1.774-1.887-.962-2.61-3.302-1.619-5.246a4.085 4.085 0 0 1 2.461-2.045l.46 1.493 1.377-2.7z">
                                        </path>
                                    </svg>
                                    Reply
                                </a>
                                <button @click="openComment()" type="button"
                                    class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-blue/15">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="currentColor"
                                        class="bi bi-pencil-square mr-1" viewBox="0 0 16 16">
                                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                    Edit
                                </button>
                            </div>
                            <div class="">
                                <!-- <p class="text-xs ">
                                    <time>{{
                                        moment.utc(comment.created_at).local().startOf('seconds').fromNow()
                                    }}
                                    </time>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </article>
        <div class="vfm vfm--inset vfm--fixed vfm--prevent-none" v-if="isOpen" data-js="reply-modal" height="auto"
            data-v-2836fdb5="" style="z-index: 1000;"><!--v-if-->
            <div class="vfm__container vfm--absolute vfm--inset vfm--outline-none flex mx-auto dark" aria-expanded="true"
                role="dialog" aria-modal="true" tabindex="-1" data-v-2836fdb5="" style="">
                <div class="vfm__content vfm__content mx-auto flex-1 rounded-none bg-white dark:bg-[#1c3150] dark:text-white md:rounded-t-2xl max-h-screen mt-auto overflow-auto flex flex-col w-full md:w-3/4 md:max-h-80 transition-transform vfm--prevent-auto"
                    data-v-2836fdb5="" style="box-shadow: rgba(27, 33, 58, 0.4) 0px 20px 60px -2px; max-width: 800px;">
                    <div class="flex py-4 px-6 md:px-8" data-v-2836fdb5-s="">
                        <div class="flex-1" data-v-2836fdb5-s="">
                            <form class="text-sm" data-v-2836fdb5-s="">
                                <div class="mb-2 flex items-center" data-v-2836fdb5-s="">
                                    <svg height="16px" viewBox="0 0 16 16" width="16px"
                                        class="mr-2 fill-current text-grey-800" data-v-2836fdb5-s="">
                                        <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"
                                            data-v-2836fdb5-s="">
                                            <g id="Group" class="fill-current" transform="translate(0.000000, -336.000000)"
                                                data-v-2836fdb5-s="">
                                                <path
                                                    d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344"
                                                    data-v-2836fdb5-s=""></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="font-semibold" data-v-2836fdb5-s="">
                                        Reply to
                                        <strong class="uppercase text-blue" data-v-2836fdb5-s="">

                                        </strong>
                                    </p>
                                </div>
                                <div class="control" data-v-2836fdb5-s="">
                                    <textarea id="body" name="body"
                                        class="textarea mb-1 overflow-auto border-l-0 border-r-0 px-0 py-4 text-sm dark:border-sky-500 dark:bg-transparent dark:font-medium dark:text-white"
                                        data-autosize="" required="" data-v-2836fdb5-s=""
                                        style="min-height: 150px; max-height: 45vh; overflow: hidden; overflow-wrap: break-word; resize: none; height: 150px;"
                                        data-tribute="true"></textarea>
                                </div>
                                <div class="flex w-full justify-end space-x-4" data-v-2836fdb5-s="">
                                    <div class="" data-v-2836fdb5-s="">
                                        <button @click="closeComment()"
                                            class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                            data-v-2836fdb5-s=""> Cancel
                                        </button>
                                    </div>
                                    <div class="" data-v-2836fdb5-s="">
                                        <button
                                            class="btn flex items-center w-full rounded-xl border-transparent bg-grey-500 normal-case text-grey-800 hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20 px-4 py-2 duration-300"
                                            data-v-2836fdb5-s="">
                                            <svg width="12" height="13" viewBox="0 0 12 13" class="mr-1">
                                                <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                                    d="M6.96 1.877L4.34.542l.435 1.413a5.196 5.196 0 0 0-3.161 2.64C.32 7.133 1.267 10.2 3.73 11.455s5.5.218 6.794-2.32a5.203 5.203 0 0 0 .316-3.989l-1.145.369c.338.955.29 2.087-.22 3.086-.99 1.944-3.308 2.735-5.194 1.774-1.887-.962-2.61-3.302-1.619-5.246a4.085 4.085 0 0 1 2.461-2.045l.46 1.493 1.377-2.7z">
                                                </path>
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
    </x-pane>
</template>

<script>
import moment from "moment-timezone";


export default {
    props: ['comment'],
    data() {
        return {
            isOpen: false,
        }
    },
    methods: {
        openComment() {
            this.isOpen = true;
        },
        closeComment() {
            this.isOpen = false;
        }
    }

}


</script>

<style></style>