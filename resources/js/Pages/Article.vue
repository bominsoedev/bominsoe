<template>
    <Head :title="article.title"/>
    <AuthenticatedLayout :nav-status="false">
        <main class="container max-w-4xl" style="max-width: 1200px;">
            <article class="flex gap-x-12 text-white">
                <div
                    class="mx-auto mt-6 max-w-[500px] flex-shrink-0 lg:sticky lg:top-[40px] lg:mt-0 lg:w-[270px] lg:self-start xl:w-[315px]">
                    <figure>
                        <div v-if="article.article_photo" class="relative overflow-hidden rounded-xl"
                             style="width: 100%; height: 445px;">
                            <img :src="'/storage/ProfileAttachment/' + article.author.photo" alt="Lary avatar "
                                 class="lazy h-full w-full object-cover lazyloaded"
                                 loading="lazy"
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
                            <h4 class="mt-2 font-poppins text-2xl font-bold leading-none">
                                {{ article.author.username }}
                                <span v-if="article.author.nickname"
                                      class="text-lg ">
                                    ( {{ article.author.nickname }} )
                                </span>
                                <div class="inline-block">
                                    <svg
                                        class="bi bi-patch-check-fill fill-blue-600 stroke-white dark:stroke-sky-300 stroke-1"
                                        height="13" viewBox="0 0 16 16"
                                        width="12"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title>Verified account</title>
                                        <path
                                            d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                    </svg>
                                </div>
                            </h4>
                            <div class="my-2 flex items-center gap-x-3">
                                <a href="">
                                    <svg class="bi bi-github" fill="currentColor" height="16" viewBox="0 0 16 16"
                                         width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg class="bi bi-facebook" fill="currentColor" height="16" viewBox="0 0 16 16"
                                         width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                </a>
                            </div>
                            <p class="content mt-3 text-[13px] lg:pr-8">
                                {{ article.author.bio }}
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
                            <div
                                class="hidden lg:flex justify-between mb-6 bg-gradient-to-ls from-frameworks-lights to-framework py-3 px-2 rounded-xl">
                                <a :href="route('article.index')"
                                   class="bg-blue-700 py-px font-semibold normal-case rounded-lg">
                                    <svg height="22" viewBox="0 0 22 22" width="22">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M21 1v20.16H.84V1z" stroke="#000" stroke-opacity=".012"
                                                  stroke-width=".5">
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
                            <div v-if="article.article_photo" class="relative mx-auto flex justify-center"
                                 style="width: 100%; height: 50vh;">
                                <img :src="`/storage/ArticleAttachment/${article.article_photo.unique_name}`"
                                     alt="Article illustration"
                                     class="lazy h-full w-full object-cover lazyloaded rounded-xl"
                                     loading="lazy"
                                     style="-webkit-mask-image: -webkit-radial-gradient(center center, white, black);">
                            </div>
                        </section>
                        <div class="bg-[#151f32] py-6 px-4 rounded-xl">
                            <section class="container" style="max-width: 1166px;">
                                <div class="mx-auto mb-8 flex w-full flex-wrap lg:flex-nowrap">
                                    <div
                                        class="relative mx-auto basis-full items-center justify-between rounded-xl p-6 font-bold text-white md:flex lg:flex-1 lg:basis-0 bg-gradient-to-ls from-frameworks-lights to-framework to-testing">
                                        <div
                                            :style="{ 'background': 'url(/Images/Icon/S.svg)  50% -1%/ 250px  no-repeat' }"
                                            class="pointer-events-none absolute top-0 bottom-0 right-0 left-0 left-1/2 -translate-x-1/2 transform opacity-10 md:block"></div>
                                        <div class="flex-1 md:mx-[2.5rem] md:flex md:space-x-6">
                                            <div class="px-4 md:flex-1 md:px-0">
                                                <header class="mb-4">
                                                    <div class="flex items-center">
                                                        <!--LIKE-->
                                                        <form
                                                            v-if="reacted == false"
                                                            @submit.prevent="like(article)">
                                                            <button
                                                                class="hidden rounded-full px-1 flex md:items-center md:justify-center bg-white/10 mr-4"
                                                                style="width: 39px; height: 39px;"
                                                                title="Want to like this article for future reference?">
                                                                <svg class="heart-svg overflow-visible"
                                                                     viewBox="467 392 58 57"
                                                                     width="35">
                                                                    <g fill="none" fill-rule="evenodd"
                                                                       transform="translate(467 392)">
                                                                        <path
                                                                            class="heart fill-current text-grey-700 dark:text-grey-600"
                                                                            d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z"></path>
                                                                        <circle class="main-circ" cx="29.5"
                                                                                cy="29.5" fill="#78909C" opacity="0"
                                                                                r="1.5"></circle>
                                                                        <g class="grp7" opacity="0"
                                                                           transform="translate(7 6)">
                                                                            <circle class="oval1" cx="2" cy="6"
                                                                                    fill="#9CD8C3" r="2"></circle>
                                                                            <circle class="oval2" cx="5" cy="2"
                                                                                    fill="#8CE8C3" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp6" opacity="0"
                                                                           transform="translate(0 28)">
                                                                            <circle class="oval1" cx="2" cy="7"
                                                                                    fill="#CC8EF5" r="2"></circle>
                                                                            <circle class="oval2" cx="3" cy="2"
                                                                                    fill="#91D2FA" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp3" opacity="0"
                                                                           transform="translate(52 28)">
                                                                            <circle class="oval2" cx="2" cy="7"
                                                                                    fill="#9CD8C3" r="2"></circle>
                                                                            <circle class="oval1" cx="4" cy="2"
                                                                                    fill="#8CE8C3" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp2" opacity="0"
                                                                           transform="translate(44 6)">
                                                                            <circle class="oval2" cx="5" cy="6"
                                                                                    fill="#CC8EF5" r="2"></circle>
                                                                            <circle class="oval1" cx="2" cy="2"
                                                                                    fill="#CC8EF5" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp5" opacity="0"
                                                                           transform="translate(14 50)">
                                                                            <circle class="oval1" cx="6" cy="5"
                                                                                    fill="#91D2FA" r="2"></circle>
                                                                            <circle class="oval2" cx="2" cy="2"
                                                                                    fill="#91D2FA" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp4" opacity="0"
                                                                           transform="translate(35 50)">
                                                                            <circle class="oval1" cx="6" cy="5"
                                                                                    fill="#F48EA7" r="2"></circle>
                                                                            <circle class="oval2" cx="2" cy="2"
                                                                                    fill="#F48EA7" r="2"></circle>
                                                                        </g>
                                                                        <g class="grp1" opacity="0"
                                                                           transform="translate(24)">
                                                                            <circle class="oval1" cx="2.5"
                                                                                    cy="3" fill="#9FC7FA"
                                                                                    r="2"></circle>
                                                                            <circle class="oval2" cx="7.5"
                                                                                    cy="2" fill="#9FC7FA"
                                                                                    r="2"></circle>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <!--UNLIKE-->
                                                        <form v-if="reacted == true" @submit.prevent="unlike(article)">
                                                            <button
                                                                class="hidden rounded-full px-1 md:flex md:items-center md:justify-center bg-white/10 mr-4"
                                                                style="width: 39px; height: 39px;"
                                                                title="Want to unlike this article for future reference?">
                                                                <svg class="flex-shrink-0 text-[#f3477e]" height="45"
                                                                     viewBox="0 0 32 32"
                                                                     width="45">
                                                                    <g class="fill-current" fill-rule="evenodd"
                                                                       stroke="none"
                                                                       stroke-width="1.2">
                                                                        <path class="fill-current"
                                                                              d="M13.6196,11.2 C11.6246857,11.2 10.4,12.85425 10.4,14.2106375 C10.4,17.143925 13.9170286,19.8671 16.4,21.6 C18.8829714,19.86645 22.4,17.143925 22.4,14.2106375 C22.4,12.8541363 21.1758971,11.2 19.1804,11.2 C18.0661143,11.2 17.1138286,12.042335 16.4,12.8420625 C15.6854857,12.0422538 14.73392,11.2 13.6196,11.2 Z"></path>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <h4 class="text-2xl font-bold leading-tight widescreen:text-3xl">
                                                            {{ article.title }}
                                                        </h4>
                                                    </div>
                                                </header>
                                                <div>
                                                    <div class="p-3">
                                                        <div
                                                            class="grid grid-cols-3 divide-x divide-solid divide-white/50">
                                                            <div class="text-center">
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                    Visit Member
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center text-sm font-semibold text-white">
                                                                    <svg class="bi bi-eye mr-3" fill="currentColor"
                                                                         height="16" viewBox="0 0 16 16"
                                                                         width="16"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                                        <path
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                    </svg>
                                                                    {{ article.visit_count }}
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                    Article Favorites
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-white">
                                                                    <svg class="bi bi-heart-fill mr-2"
                                                                         fill="currentColor"
                                                                         height="16" viewBox="0 0 16 16"
                                                                         width="16" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"
                                                                            fill-rule="evenodd"/>
                                                                    </svg>
                                                                    <span>{{ article.reactions.length }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div
                                                                    class="mb-2 font-cabin text-2xs font-medium text-white/75">
                                                                    Published
                                                                </div>
                                                                <div
                                                                    class="inline-flex items-center mx-auto text-sm font-semibold text-white">
                                                                    <svg class="bi bi-clock-history mr-2"
                                                                         fill="currentColor"
                                                                         height="16" viewBox="0 0 16 16"
                                                                         width="16"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                                        <path
                                                                            d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                                        <path
                                                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                                    </svg>
                                                                    <span>
                                                                        {{
                                                                            moment(article.created_at).format('MMMM Do, YYYY')
                                                                        }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4 leading-loose" v-html="article.body"></div>
                            </section>
                        </div>
                        <section class="mt-3 bg-[#151f32] py-6 px-4 rounded-xl">
                            <div id="replies">
                                <ArticleCommentForm :article="article" :can-login="canLogin"></ArticleCommentForm>
                                <div v-for="comment in article.comments" class="reply-with-responses">
                                    <ArticleComment :key="comment.uuid"
                                                    :comment="comment"
                                                    :reacted="reacted"
                                    >
                                    </ArticleComment>
                                </div>
                            </div>
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
import ArticleReply from "@/Components/ArticleReply.vue";
import {Button} from "view-ui-plus";

const props = defineProps({
    article: {},
    reacted: {
        type: Boolean
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

const form = useForm({});

const like = (param) => {
    form.post(route('article.store_reaction', param));
};
const unlike = (param) => {
    form.post(route('article.destroy_reaction', param));
};
</script>

<style lang="scss" scoped></style>
