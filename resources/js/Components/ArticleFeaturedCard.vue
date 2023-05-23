<template>
    <article class="transition-colors duration-500 rounded-xl bg-panel-800 hover:bg-panel-700">
        <div class="py-6 px-5 flex">
            <div v-if="article.article_photo" class="flex-1 lg:mr-8" style="width: 100%; height: 400px;">
                <img :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                     alt="Blog Post illustration"
                     class="lazy h-full w-full object-cover lazyloaded rounded-xl"
                     loading="lazy"
                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="">
                    <div class="flex justify-between">
                        <a :href="route('profile.information',article.author)"
                           class="flex items-center text-white mb-3">
                            <div v-if="article.author.photo" class="">
                                <img :src="'/storage/ProfileAttachment/' + article.author.photo" alt=""
                                     class="mr-2 lazy object-cover lazyloaded rounded-full"
                                     loading="lazy" style="height: 28px" width="30">
                            </div>
                            <div v-else
                                 aria-hidden="true"
                                 class="mr-2 flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                                 height="30" width="30">
                                {{ $page.props.auth.user.username.split("")[0] }}
                            </div>
                            {{ article.author.username }}
                            <BlueBadgeIcon/>
                        </a>
                        <div class="space-x-1">
                            <CategoryBotton :category="article.category"></CategoryBotton>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-3xl text-sky-500">
                            <a :href="article.uuid">
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

                <div class="text-sm mt-2 text-white" v-html="article.excerpt">
                </div>
                <a :href="route('article.show', article)"
                   class="transition-colors duration-300 text-xs font-semibold text-gray-400">Read
                    More</a>
                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center">
                        <svg class="bi bi-heart-fill text-[#f3477e] mr-2"
                             fill="currentColor"
                             height="16" viewBox="0 0 16 16"
                             width="16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                fill-rule="evenodd"/>
                        </svg>
                        <span class="text-white/70">{{ article.reactions.length }}</span>
                    </div>
                    <div v-if="article.comments_count" class="">
                        <a :href="article.uuid">
                            <comment class="flex items-center space-x-1 text-white/70">
                                <span class="mr-1">{{ article.comments_count.length }}</span>
                                <svg class="bi bi-chat-left" fill="currentColor" height="16" viewBox="0 0 16 16"
                                     width="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                </svg>
                            </comment>
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
import BlueBadgeIcon from "@/Components/BlueBadgeIcon.vue";

const props = defineProps({
    article: {}
})

</script>

<style scoped></style>
