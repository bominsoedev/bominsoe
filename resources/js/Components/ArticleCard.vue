<template>
    <article class="transition-colors duration-300 rounded-xl bg-gradient-to-l from-frameworks-light to-frameworks">
        <div class="py-4 px-3">
            <figure v-if="article.article_photo">
                <div class="relative overflow-hidden rounded-xl" style="width: 100%; height: 345px;">
                    <img loading="lazy" :src="'/storage/ArticleAttachment/' + article.article_photo.unique_name" alt="Lary avatar "
                        class="lazy h-full w-full object-cover lazyloaded"
                        style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                </div>
            </figure>
            <div class="mt-5 flex flex-col justify-between">
                <header>
                    <div class="flex justify-between">
                        <a :href="route('profile.information',article.author)" class="flex items-center text-white">
                            <div v-if="article.author.photo" class="">
                                <img :src="'/storage/ProfileAttachment/' + article.author.photo" alt=""
                                     class="mr-2 lazy object-cover lazyloaded rounded-full duration-300 ease-in-out hover:opacity-100 opacity-90 transition"
                                     loading="lazy" style="height: 28px" width="30">
                            </div>
                            <div v-else
                                 aria-hidden="true"
                                 class="mr-2 flex items-center uppercase justify-center rounded-full bg-blue-50 text-blue-700 dark:border-gray-400 border-none"
                                 height="30" width="30">
                                {{ $page.props.auth.user.username.split("")[0] }}
                            </div>
                            {{ article.author.username }}
                            <svg
                                class="bi bi-patch-check-fill fill-blue-600 stroke-white dark:stroke-sky-300 stroke-1 ml-1"
                                height="13" viewBox="0 0 16 16"
                                width="12"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Verified account</title>
                                <path
                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        </a>
                        <div class="space-x-1">
                            <CategoryBotton :category="article.category"></CategoryBotton>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h1 class="text-lg text-sky-500">
                            <a :href="article.uuid">
                                {{ article.title }}
                            </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs text-white">
                            Published
                            <time>
                                {{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}
                            </time>
                        </span>
                    </div>
                </header>
                <div v-html="article.excerpt" class="text-sm mt-3 text-white">
                </div>
                <a :href="route('article.show', article)"
                   class="transition-colors duration-300 text-xs font-semibold">Read
                    More</a>
                <footer class="flex justify-between items-center mt-5">
                    <div v-if="article.reactions.length" class="flex items-center">
                        <svg class="bi bi-heart-fill text-[#f3477e] mr-2"
                             fill="currentColor"
                             height="16" viewBox="0 0 16 16"
                             width="16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                fill-rule="evenodd"/>
                        </svg>
                        <span>{{ article.reactions.length }}</span>
                    </div>
                    <div v-if="article.comments_count" class="">
                        <a :href="article.uuid">
                            <comment><span class="mr-1">{{article.comments_count.length}}</span>comment</comment>
                        </a>
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
