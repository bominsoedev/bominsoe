<template>
    <article class="transition-colors duration-300 rounded-xl bg-gradient-to-l from-frameworks-light to-frameworks">
        <div class="py-6 px-5 lg:flex">
            <div v-if="article.article_photo" class="flex-1 lg:mr-8" style="width: 100%; height: 300px;">
                <img :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                     alt="Blog Post illustration"
                     class="lazy h-full w-full object-cover lazyloaded"
                     loading="lazy"
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

                <div class="text-sm mt-2 text-white" v-html="article.excerpt">
                </div>
                <a :href="route('article.show', article)"
                   class="transition-colors duration-300 text-xs font-semibold">Read
                    More</a>
                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <div v-if="article.author.photo" class="">
                            <img loading="lazy" :src="'/storage/ProfileAttachment/' + article.author.photo" alt=""
                                 width="30" class="lazy object-cover lazyloaded rounded-full" style="height: 28px">
                        </div>
                        <div v-else
                            aria-hidden="true"
                            class="flex h-8 w-8 items-center uppercase justify-center rounded-full border-2 border-gray-200 bg-blue-50 text-blue-700 dark:border-gray-400 h-[30px] w-[30px] border-none"
                            height="30" width="30">
                            {{ $page.props.auth.user.username.split("")[0] }}
                        </div>
                        <div class="ml-2">
                            <h5 class="font-bold text-white flex items-center space-x-1">
                                <a :href="route('profile.information',article.author)" class="flex items-center">
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
                            </h5>
                        </div>
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
