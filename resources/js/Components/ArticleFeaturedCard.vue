<template>
    <article class="transition-colors duration-300 rounded-xl bg-gradient-to-l from-frameworks-light to-frameworks">
        <div class="py-6 px-5 lg:flex">
            <div class="flex-1 lg:mr-8">
                <img :src="`storage/Images/ArticleAttachment/${article.photo.unique_name}`" alt="Blog Post illustration"
                    class="rounded-xl">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <div class="space-x-1">
                        <CategoryBotton :category="article.category"></CategoryBotton>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl text-white">
                            <a href="{{'/articles/'.article.slug}}">
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
                        <!--                        <img src="/images/lary-avatar.svg" alt="Lary avatar">-->
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
