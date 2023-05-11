<template>
    <x-pane v-if="canLogin">
        <form method="POST" action="" >
            <header class="flex items-center">
                <!--                <img src="https://i.pravatar.cc/100/?u={{auth()->id()}}}" alt="" width="40" height="40"-->
                <!--                     class="rounded-full">-->
                <h3 class="ml-4">Want to participate?</h3>
            </header>
            <div class="mt-6">
                <textarea name="comment"
                          class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-sm focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md"
                          id="comment"
                          rows="5"
                          placeholder="Aa"></textarea>
            </div>
            <div class="flex justify-end">
                <primary-button>SEND</primary-button>
            </div>
        </form>
    </x-pane>
    <template v-else>
        <p class="text-xs rounded-xl inline-block bg-slate-900 px-3 py-3 uppercase">

            <a class="text-blue-500 hover:underline" :href="route('register')">REGISTER</a>
            or
            <a class="text-blue-500 hover:underline" :href="route('login')">LOGIN
            </a>
            to a leave comments.

        </p>
    </template>


</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
const submit = () => {
    form.post(route('category.store'), {
        onFinish: () => form.reset('category'),
    });
};
const form = useForm({
    comment: '',
})
</script>

<style lang="scss" scoped>

</style>
