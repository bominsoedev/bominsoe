<template>
    <ArticleFeaturedCard v-if="articles.length"  :article="articles[0]"/>
    <div class="lg:grid lg:grid-cols-6">
        <article-card v-if="articles.length" v-for="article in arts" :article="article" :class="classes" />
    </div>
</template>

<script setup>
import ArticleCard from "@/Components/ArticleCard.vue";
import ArticleFeaturedCard from "@/Components/ArticleFeaturedCard.vue";
import { computed } from "vue";

const props = defineProps({
    articles: []
})

const arts = [...props.articles]
arts.shift()

const classes = computed(() =>
    props.articles.length < 3
        ? 'col-span-3 mr-3 mb-3'
        : 'col-span-2 mr-3 mb-3'
);

</script>

<style scoped></style>
