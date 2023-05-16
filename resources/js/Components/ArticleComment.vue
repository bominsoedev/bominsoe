<template>
    <x-pane class="bg-gray-100 mt-3">
        <article class="mt-2">
            <div class="flex items-center space-x-2">
                <div class="mr-2">
                    <img :src="'/storage/ArticleAttachment/'+comment.photo.unique_name" alt="" width="30"
                         class="rounded-full" style="height: 30px">
                </div>
                <div class="bg-gray-800 p-3 rounded-lg w-full">
                    <h3 class="text-lg font-bold">{{ comment.author.username }}</h3>
                    <div class="">
                        <p>
                            {{ comment.body }}
                        </p>
                    </div>
                    <div class="text-end">
                        <p class="text-xs ">
                            <time>{{ moment.utc(comment.created_at).local().startOf('seconds').fromNow() }}</time>
                        </p>
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
