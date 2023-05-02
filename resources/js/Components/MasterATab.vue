<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <Link :href="href" class="inline-flex duration-300 items-center px-4 py-2 bg-gray-800 dark:bg-sky-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-sky-700 dark:hover:bg-sky-600 focus:bg-sky-700 dark:focus:bg-sky-800 active:bg-sky-900 dark:active:bg-sky-800 dark:active:text-gray-400 transition ease-in-out duration-150">
        <slot />
    </Link>
</template>
