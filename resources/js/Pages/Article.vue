<template>
    <Head :title="article.title" />
    <AuthenticatedLayout>
        <main class="container max-w-4xl" style="max-width: 1200px;">
            <article class="flex gap-x-12 text-white gap-x-20">
                <div
                    class="mx-auto mt-6 max-w-[500px] flex-shrink-0 lg:sticky lg:top-[40px] lg:mt-0 lg:w-[270px] lg:self-start xl:w-[315px]">
                    <figure>
                        <div v-if="article.photo" class="relative overflow-hidden rounded-xl" style="width: 100%; height: 445px;">
                            <img loading="lazy" :src="'/storage/ArticleAttachment/'+article.photo.unique_name"
                                 alt="Lary avatar "
                                 class="lazy h-full w-full object-cover lazyloaded"
                                 style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                        </div>
                    </figure>
                    <figcaption class="mt-4 px-8">
                        <h5 class="flex items-center gap-x-3 font-poppins font-semibold text-grey-600">
                            <span class="flex-shrink-0 text-xs">
                                 Published
                        <time>{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</time>
                            </span>
                            <span class="h-px w-full bg-gray-600"></span>
                        </h5>
                        <h4 class="mt-2 font-poppins text-3xl font-light leading-none">
                            {{ article.author.username }}
                        </h4>
                        <div class="mt-2 flex items-center gap-x-3">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                            </a>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                        </div>
                        <p class="content mt-3 text-[13px] lg:pr-8">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, reiciendis!
                        </p>
                    </figcaption>
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
                    <section class="mt-10 space-y-6">
                        <ArticleCommentForm :can-login="canLogin" :article="article"></ArticleCommentForm>
                        <ArticleComment v-for="comment in article.comments" :key="comment.uuid" :comment="comment">
                        </ArticleComment>
                    </section>
                </div>
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
