<template>
    <Head :title="article.title" />
    <AuthenticatedLayout>
        <main class="container max-w-4xl" style="max-width: 1200px;">
            <article class="flex flex-col-reverse gap-x-12 text-white lg:flex-row lg:justify-center xl:gap-x-20">
                <div
                    class="mx-auto mt-6 max-w-[500px] flex-shrink-0 lg:sticky lg:top-[40px] lg:mt-0 lg:w-[270px] lg:self-start xl:w-[315px]">
                    <figure>
                        <div class="relative overflow-hidden rounded-xl" style="width: 100%; height: 445px;">
                            <img loading="lazy" :src="'/storage/ArticleAttachment/'+article.photo.unique_name"
                                 alt="Lary avatar "
                                 class="lazy h-full w-full object-cover lazyloaded"
                                 style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                        </div>
                    </figure>
                    <figcaption class="mt-4 px-8">
                        <h5 class="flex items-center gap-x-3 font-poppins font-semibold text-grey-600">Bominsoe</h5>
                    </figcaption>
                    <p class="mt-4 block text-gray-400 text-xs text-center">
                        Published
                        <time>{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</time>
                    </p>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/100/?u={{article.author.username}}" alt="" width="60"
                             height="60" class="rounded-xl">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a :href="'/?author='+article.author.username">
                                    {{ article.author.username }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a :href="route('article.index')"
                           class="btn btn-dark-blue py-px px-4 font-semibold normal-case rounded-lg">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back
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
import {Head, useForm} from "@inertiajs/vue3";
import {use} from "view-ui-plus/src/locale";
import {env} from "@inertiajs/inertia-vue3/.eslintrc";

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
