<template>
    <a v-for="c in category" :href="route('article.index')+'/?category='+c.slug"
       class="text-blue-800 border border-sky-500 text-xs font-medium px-2.5 py-0.5 rounded dark:text-blue-300">
        {{ c.name }}
    </a>
</template>

<script setup>
const props = defineProps({
    category: {}
});
</script>

<style scoped>

</style>
