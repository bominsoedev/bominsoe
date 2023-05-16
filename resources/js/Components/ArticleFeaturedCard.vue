<template>
    <article class="transition-colors duration-300 rounded-xl bg-gradient-to-l from-frameworks-light to-frameworks">
        <div class="py-6 px-5 lg:flex">
            <div v-if="article.photo" class="flex-1 lg:mr-8" style="width: 100%; height: 300px;">
                <img loading="lazy" :src="`/storage/ArticleAttachment/${article.photo.unique_name}`"
                     alt="Blog Post illustration"
                     class="lazy h-full w-full object-cover lazyloaded"
                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-0">
                    <div class="space-x-1">
                        <CategoryBotton :category="article.category"></CategoryBotton>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl text-sky-500">
                            <a :href="article.slug">
                                {{ article.title }}
                            </a>
                        </h1>

                        <span class="my-2 block text-white text-xs">
                            Published
                            <time>
                                {{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}
                            </time>
                        </span>
                    </div>
                </header>

                <div v-html="article.excerpt" class="text-sm mt-2 text-white">

                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <div
                            class="flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                            aria-hidden="true" height="30" width="30">
                            {{ $page.props.auth.user.username.split("")[0] }}
                        </div>
                        <div class="ml-3">
                            <h5 class="font-bold text-white">
                                <a href="{{'/?author='.article.author.username }}">
                                    {{ article.author.username }}
                                </a>
                            </h5>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <a :href="route('article.show', article)"
                           class="transition-colors duration-300 text-xs font-semibold bg-slate-800 hover:bg-slate-900 rounded py-2 px-8">Read
                            More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</template>

<script setup>
import CategoryBotton from "@/Components/CategoryBotton.vue";
import moment from "moment-timezone";

const props = defineProps({
    article: {}
})

</script>

<style scoped></style>
