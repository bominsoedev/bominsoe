<template>
    <Head :title="article.title" />
    <AuthenticatedLayout>
        <main class="mx-auto rounded-xl space-y-6 border border-gray-600 px-3 py-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10 border-r-2 border-r-gray-600 pr-3">
                    <img src="public/Images/Icon/BOMINSOE.svg" alt="Lary avatar " class="rounded-xl">
                    <p class="mt-4 block text-gray-400 text-xs text-center">
                        Published
                        <time>{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</time>
                    </p>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/100/?u={{article.author.username}}" alt="" width="60" height="60"
                            class="rounded-xl">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ article.author.name }}">
                                    {{ article.author.username }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-xs bg-slate-900 mr-2 m-0 rounded-xl text-xs font-semibold text-white py-2 px-3 hover:bg-slate-800">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <CategoryBotton :category="article.category"></CategoryBotton>
                        </div>
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ article.title }}
                    </h1>
                    <div v-html="article.body" class="space-y-4 lg:text-lg leading-loose">
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <ArticleCommentForm :can-login="canLogin" :article="article"></ArticleCommentForm>
                    <ArticleComment v-for="comment in article.comments" :key="comment.uuid" :comment="comment">
                    </ArticleComment>
                </section>
            </article>
        </main>
    </AuthenticatedLayout>
</template>

<script setup>

import CategoryBotton from "@/Components/CategoryBotton.vue";
import ArticleComment from "@/Components/ArticleComment.vue";
import ArticleCommentForm from "@/Pages/ArticleCommentForm.vue";
import moment from "moment-timezone";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { use } from "view-ui-plus/src/locale";

const props = defineProps({
    article: [],
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

</script>

<style lang="scss" scoped></style>
