<template>
    <x-pane class="bg-gray-100 mt-3">
        <article class="mt-5">
            <div>
                <div class="flex space-x-2">
                    <div class="mr-2">
                        <img loading="lazy" :src="'/storage/ArticleAttachment/'+comment.photo.unique_name" alt=""
                             width="30"
                             class="lazy object-cover lazyloaded rounded-full" style="height: 28px">
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
                                <div class="">
                                    <a href=""
                                       class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-1 btn btn-dark-blue hover:bg-blue/15">
                                        <svg width="12" height="13" viewBox="0 0 12 13" class="mr-1">
                                            <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                                                  d="M6.96 1.877L4.34.542l.435 1.413a5.196 5.196 0 0 0-3.161 2.64C.32 7.133 1.267 10.2 3.73 11.455s5.5.218 6.794-2.32a5.203 5.203 0 0 0 .316-3.989l-1.145.369c.338.955.29 2.087-.22 3.086-.99 1.944-3.308 2.735-5.194 1.774-1.887-.962-2.61-3.302-1.619-5.246a4.085 4.085 0 0 1 2.461-2.045l.46 1.493 1.377-2.7z"></path>
                                        </svg>
                                        Reply
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <p class="text-xs ">
                                    <time>{{
                                            moment.utc(comment.created_at).local().startOf('seconds').fromNow()
                                        }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </x-pane>
</template>

<script setup>

import moment from "moment-timezone";

const props = defineProps({
    comment: {}
})

</script>

<style scoped></style>
