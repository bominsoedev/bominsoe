<template>
    <x-pane class="bg-gray-100 mt-3">
        <article class="flex space-x-4">
            <div class="flex-shrink-0">
                <img src="https://i.pravatar.cc/100/?u={{comment.author.username}}" alt="" width="60" height="60" class="rounded-xl">
            </div>
            <div class="w-full border border-gray-600 p-3 mt-3">
                <header>
                    <h3 class="font-bold">{{comment.author.username}}</h3>
                    <p class="text-xs mb-4">Comment
                        <time>{{moment.utc(comment.created_at).local().startOf('seconds').fromNow()}}</time>
                    </p>
                    <p>
                        {{comment.body}}
                    </p>
                </header>
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

<style scoped>

</style>
