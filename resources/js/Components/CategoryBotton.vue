<template>
    <a v-for="c in category"
       class="text-white/70 duration-300 border border-sky-500 text-xs font-medium px-2.5 py-0.5 rounded"
       :class="classes"
       :href="route('article.index')+'/?category='+c.slug">
        {{ c.name }}
    </a>
</template>

<script setup>
defineProps({
    category: {},
    classes: ""
});
</script>

<style scoped>

</style>
