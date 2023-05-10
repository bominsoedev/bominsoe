<template>
    <article
        class="transition-colors duration-300 rounded-xl bg-gradient-to-l from-frameworks-light to-frameworks">
        <div class="py-6 px-5">
            <div>
                <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
            </div>

            <div class=" mt-8 flex flex-col justify-between">
                <header>
                    <div class="space-x-1">
                        <CategoryBotton :category="article.category"></CategoryBotton>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-lg text-white">
                            <a href="/articles/{{article.slug}}">
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

                <div class="text-sm mt-4 text-white">
                    <p>
                        {{ article.excerpt }}
                    </p>
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <!--                    <img src="/images/lary-avatar.svg" alt="Lary avatar">-->
                        <div class="ml-3">
                            <h5 class="font-bold text-white">
                                <a href="/?author={{ article.author.username }}">
                                    {{ article.author.username }}
                                </a>
                            </h5>
                        </div>
                    </div>
                    <div>
                        <a href="{{'/articles/'.article.slug}}"
                           class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded py-2 px-8"
                        >Read More</a>
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
    article:{}
})
</script>

<style scoped>

</style>
