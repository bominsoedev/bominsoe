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
        ? 'sidebar-link flex p-2 rounded items-center text-xs duration-300 font-normal group hover:text-sky-500 hover:bg-blue/13 text-sky-500 bg-blue-10'
        : 'sidebar-link flex p-2 rounded items-center text-white text-xs duration-300 font-normal group hover:text-sky-500 hover:bg-blue-10'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
