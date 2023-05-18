<template>
    <Head :title="article.title"/>
    <AuthenticatedLayout>
        <main class="container max-w-4xl" style="max-width: 1200px;">
            <article class="flex gap-x-12 text-white">
                <div
                    class="mx-auto mt-6 max-w-[500px] flex-shrink-0 lg:sticky lg:top-[40px] lg:mt-0 lg:w-[270px] lg:self-start xl:w-[315px]">
                    <figure>
                        <div v-if="article.photo" class="relative overflow-hidden rounded-xl"
                             style="width: 100%; height: 445px;">
                            <img loading="lazy" :src="'/storage/ArticleAttachment/'+article.photo.unique_name"
                                 alt="Lary avatar "
                                 class="lazy h-full w-full object-cover lazyloaded"
                                 style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                        </div>
                    </figure>
                    <figcaption class="mt-4">
                        <h5 class="flex items-center gap-x-3 font-poppins font-semibold text-sky-600">
                            <span class="h-px w-full bg-sky-600"></span>
                            <span class="flex-shrink-0 text-xs">
                                 Published
                        <time>{{ moment.utc(article.created_at).local().startOf('seconds').fromNow() }}</time>
                            </span>
                            <span class="h-px w-full bg-sky-600"></span>
                        </h5>
                        <div class="bg-panel-800 p-3 my-4 rounded-xl">
                            <h4 class="mt-2 font-poppins text-2xl font-bold leading-none text-sky-600">
                                {{ article.author.username }}
                            </h4>
                            <div class="my-2 flex items-center gap-x-3">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                </a>
                            </div>
                            <p class="content mt-3 text-[13px] lg:pr-8">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, reiciendis!
                            </p>
                        </div>
                    </figcaption>
                    <div class="col-span-6 lg:col-span-4">
                        <div
                            class="panel relative transition-colors duration-300 dark text-white bg-panel-800 px-4 rounded-xl py-3">
                            <div class="flex justify-between">
                                <h4 class="my-2 font-poppins text-2xl font-bold leading-none text-sky-600">
                                    Article Description
                                </h4>
                            </div>
                            <div class="content user-content !mb-0 text-sm">
                                <p>
                                   {{ article.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <main class="">
                    <div class="col-span-8">
                        <section class="max-w-none p-0 flex-1 mb-3 ">
                            <div class="hidden lg:flex justify-between mb-6 bg-gradient-to-ls from-frameworks-lights to-framework py-3 px-2 rounded-xl">
                                <a :href="route('article.index')"
                                   class="bg-blue-700 py-px font-semibold normal-case rounded-lg">
                                    <svg width="22" height="22" viewBox="0 0 22 22">
                                        <g fill="none" fill-rule="evenodd">
                                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                                  d="M21 1v20.16H.84V1z">
                                            </path>
                                            <path class="fill-current"
                                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>

                                <div class="space-x-2">
                                    <CategoryBotton :category="article.category"></CategoryBotton>
                                </div>
                            </div>
                            <div class="relative mx-auto flex justify-center" style="width: 100%; height: 50vh;">
                                <img loading="lazy" :src="`/storage/ArticleAttachment/${article.photo.unique_name}`"
                                     alt="Article illustration"
                                     class="lazy h-full w-full object-cover lazyloaded rounded-xl"
                                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                            </div>
                        </section>
                        <div class="bg-[#151f32] py-6 px-4 rounded-xl">
                            <section class="container" style="max-width: 1166px;">
                                <div class="mx-auto mb-8 flex w-full flex-wrap lg:flex-nowrap">
                                    <div
                                        class="relative mx-auto basis-full items-center justify-between rounded-xl p-6 font-bold text-white md:flex lg:flex-1 lg:basis-0 bg-gradient-to-ls from-frameworks-lights to-framework to-testing">
                                        <div
                                            class="pointer-events-none absolute top-0 bottom-0 right-0 left-0 left-1/2 -translate-x-1/2 transform opacity-30 md:block"
                                            :style="{ 'background': 'url(/Images/Icon/S.svg)  50% -1%/ 250px  no-repeat' }"></div>
                                        <div class="flex-1 md:mx-[2.5rem] md:flex md:space-x-6">
                                            <div class="px-4 md:flex-1 md:px-0">
                                                <header class="mb-8">
                                                    <div class="flex items-center">
                                                        <button
                                                            class="rounded-full px-1 md:flex md:items-center md:justify-center bg-white/10 mr-4"
                                                            style="width: 39px; height: 39px;">
                                                            <svg viewBox="0 0 32 32" width="45" height="45"
                                                                 class="flex-shrink-0 text-white">
                                                                <g stroke="none" stroke-width="1.2" class="fill-current"
                                                                   fill-rule="evenodd">
                                                                    <path class="fill-current"
                                                                          d="M13.6196,11.2 C11.6246857,11.2 10.4,12.85425 10.4,14.2106375 C10.4,17.143925 13.9170286,19.8671 16.4,21.6 C18.8829714,19.86645 22.4,17.143925 22.4,14.2106375 C22.4,12.8541363 21.1758971,11.2 19.1804,11.2 C18.0661143,11.2 17.1138286,12.042335 16.4,12.8420625 C15.6854857,12.0422538 14.73392,11.2 13.6196,11.2 Z"></path>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <h4 class="text-2xl font-bold leading-tight widescreen:text-3xl">
                                                            {{ article.title }}
                                                        </h4>
                                                    </div>
                                                </header>
                                                <div>
                                                    <dl class="flex divide-x divide-solid divide-white/15 md:ml-1">
                                                        <div class="px-5">
                                                            <dt class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                Visit Member
                                                            </dt>
                                                            <dd class="flex items-center text-sm font-semibold text-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor" class="bi bi-eye mr-3"
                                                                     viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                    <path
                                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                </svg>
                                                                {{ article.visit_count }}
                                                            </dd>
                                                        </div>
                                                        <div class="px-5">
                                                            <dt class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                Article Favorites
                                                            </dt>
                                                            <dd class="flex items-center text-sm font-semibold text-white">
                                                                <svg viewBox="0 0 32 32" width="30" height="30"
                                                                     class="text-white">
                                                                    <g stroke="none" stroke-width="1.2"
                                                                       class="fill-current"
                                                                       fill-rule="evenodd">
                                                                        <path class="fill-current"
                                                                              d="M13.6196,11.2 C11.6246857,11.2 10.4,12.85425 10.4,14.2106375 C10.4,17.143925 13.9170286,19.8671 16.4,21.6 C18.8829714,19.86645 22.4,17.143925 22.4,14.2106375 C22.4,12.8541363 21.1758971,11.2 19.1804,11.2 C18.0661143,11.2 17.1138286,12.042335 16.4,12.8420625 C15.6854857,12.0422538 14.73392,11.2 13.6196,11.2 Z"></path>
                                                                    </g>
                                                                </svg>
                                                                222
                                                            </dd>
                                                        </div>
                                                        <div class="px-5">
                                                            <dt class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                Published
                                                            </dt>
                                                            <dd class="text-sm font-semibold text-white">
                                                                {{ moment(article.created_at).format('MMMM Do, YYYY') }}
                                                            </dd>
                                                        </div>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="font-bold text-3xl lg:text-4xl mb-10">

                                </h1>
                                <div v-html="article.body" class="space-y-4 leading-loose">

                                </div>
                            </section>
                        </div>
                        <section class="mt-5 space-y-6 bg-[#151f32] py-6 px-4 rounded-xl">
                            <ArticleCommentForm :can-login="canLogin" :article="article"></ArticleCommentForm>
                            <ArticleComment v-for="comment in article.comments" :key="comment.uuid"
                                            :comment="comment">
                            </ArticleComment>
                        </section>
                    </div>
                </main>
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
import {comment} from "postcss";
import ArticleReply from "@/Components/ArticleReply.vue";

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
