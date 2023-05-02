<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'flex h-10 items-center justify-center gap-x-2 rounded-lg px-3 text-sm font-semibold text-gray-800 hover:text-sky-400 dark:hover:text-sky-400 bg-sky-50 dark:bg-gray-800 dark:text-sky-400'
        : 'flex h-10 items-center justify-center gap-x-2 rounded-lg px-3 text-sm font-semibold text-gray-800 hover:text-sky-400 dark:hover:text-sky-400 dark:text-gray-400'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
