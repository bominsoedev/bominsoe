<template>
    <article class="transition-colors duration-500 rounded-xl from-frameworks-light to-frameworks bg-gradient-to-l">
        <div class="py-3 px-2 flex">
            <div v-if="article.article_photo" class="flex-1 lg:mr-8" style="width: 80%;">
                <img :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                     alt="Blog Post illustration"
                     class="lazy object-cover rounded-xl"
                     loading="lazy">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <a :href="route('profile.information',article.author)"
                               class="flex items-center text-white">
                                <div v-if="article.author.photo" class="">
                                    <img :src="'/storage/ProfileAttachment/' + article.author.photo" alt=""
                                         class="mr-2 lazy object-cover lazyloaded rounded-full"
                                         loading="lazy" style="height: 28px" width="30">
                                </div>
                                <div v-else
                                     aria-hidden="true"
                                     class="mr-2 flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                                     height="30" width="30">
                                    {{ article.author.username.split("")[0] }}
                                </div>
                                {{ article.author.username }}
                            </a>
                            <BlueBadgeIcon/>
                        </div>
                        <div class="space-x-1">
                            <CategoryBotton :category="article.category"></CategoryBotton>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-3xl text-sky-500">
                            <a :href="route('article.show',article.uuid)">
                                {{ article.title }}
                            </a>
                        </h1>

                        <span class="my-2 block text-white text-xs">
                            Published
                                <Time :time="article.created_at" :interval="1" />
                        </span>
                    </div>
                </header>
                <div class="content user-content text-[13px] text-grey-100 mt-6">
                    <div class="content user-content" v-html="article.excerpt">
                    </div>
                    <a :href="route('article.show', article)"
                       class="transition-colors duration-300 text-xs font-semibold text-gray-400">Read
                        More</a>
                </div>
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
                        <span :interval="1" class="text-white/70">
<!--                            <Time :time="article.created_at" :interval="1" />-->
                            {{ article.reactions.length }}
                        </span>
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

defineProps({
    article: {}
})

</script>

<style scoped>
.to-frameworks {
    --tw-gradient-to: v-bind('article.gradient_left');
}

.from-frameworks-light {
    --tw-gradient-from: v-bind('article.form_frameworks');
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(244, 72, 129, 0));
}

.bg-gradient-to-l {
    background-image: linear-gradient(to left, var(--tw-gradient-stops));
}
</style>
