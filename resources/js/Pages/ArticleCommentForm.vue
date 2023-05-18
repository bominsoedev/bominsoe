<template>
    <x-pane v-if="canLogin">
        <form @submit.prevent="submit" class="p-3 border-b border-gray-600">
            <div class="">
                <textarea
                    v-model="form.comment"
                    class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-sm focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md"
                    id="comment"
                    rows="3"
                    placeholder="Aa"></textarea>
            </div>
            <InputError class="mt-2" :message="form.errors.comment"/>
            <div class="flex justify-end">
                <button
                    class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-3 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                         class="bi bi-send mr-1" viewBox="0 0 16 16">
                        <path fill="#78909C" fill-rule="evenodd" stroke="#78909C" stroke-width=".5"
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                    Comment
                </button>
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

const form = useForm({
    comment: '',
})
const submit = () => {
    form.post(route('comment.store', props.article), {
        onSuccess: () => form.reset('comment'),
    });
};
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    article: [],
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<style lang="scss" scoped>

</style>
