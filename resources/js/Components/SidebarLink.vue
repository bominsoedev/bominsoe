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
        ? 'sidebar-link flex p-2 rounded items-center hover:text-sky-500 hover:bg-gray-300 text-xs duration-300 font-normal group dark:hover:text-sky-500 dark:hover:bg-gray-700 bg-gray-300 dark:text-sky-500 dark:bg-gray-800'
        : 'sidebar-link flex p-2 rounded items-center dark:text-white hover:text-sky-500 hover:bg-gray-300 text-xs duration-300 font-normal group dark:hover:text-sky-500 dark:hover:bg-gray-700'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
