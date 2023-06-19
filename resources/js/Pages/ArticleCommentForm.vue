<template>
    <x-pane v-if="canLogin">
        <!--        <div class="text-center">-->
        <!--            <button-->
        <!--                :aria-controls="article.uuid"-->
        <!--                :data-drawer-show="article.uuid"-->
        <!--                :data-drawer-target="article.uuid"-->
        <!--                class="text-white bg-blue-700 text-sm px-5 py-2.5 mr-2 mb-2"-->
        <!--                data-drawer-placement="bottom"-->
        <!--                type="button"-->
        <!--            >-->
        <!--                Show bottom drawer-->
        <!--            </button>-->
        <!--        </div>-->
        <div
            class="panel relative transition-colors duration-300 dark text-white bg-panel-800 hover:bg-panel-700 px-8 rounded-xl mt-6 border border-dashed border-blue-400 py-0 text-sm hover:border-blue"
        >
            <button
                :aria-controls="article.uuid"
                :data-drawer-show="article.uuid"
                :data-drawer-target="article.uuid"
                data-drawer-placement="bottom"
                type="button"
                class="inherits-color block flex w-full items-center p-6"
            >
                Write a reply.
            </button>
        </div>

        <!-- drawer component -->
        <div
            :id="article.uuid"
            :aria-labelledby="article.uuid"
            class="fixed forum-comment bottom-0 left-0 right-0 z-40 w-5/12 mx-auto p-4 rounded-lg overflow-y-auto transition-transform bg-panel-700 transform-none"
            tabindex="-1"
        >
            <h5
                :id="article.uuid"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500"
            >
                <svg
                    aria-hidden="true"
                    class="w-5 h-5 mr-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        clip-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        fill-rule="evenodd"
                    ></path>
                </svg>
                <p class="font-semibold text-sm">
                    Reply
                    <span class="uppercase text-sky-500"> Article </span>
                </p>
            </h5>
            <button
                :aria-controls="article.uuid"
                :data-drawer-hide="article.uuid"
                class="text-gray-400 ml-auto text-2xs p-1.5 absolute top-2.5 right-2.5 inline-flex items-center rounded-xl bg-panel-800 hover:bg-gray-900 duration-300"
                type="button"
            >
                <span class="">close</span>
            </button>
            <div class="">
                <textarea
                    id="comment"
                    v-model="form.comment"
                    class="w-full border border-gray-700 text-gray-300 text-sm bg-transparent focus:border-sky-600 focus:ring-sky-600 rounded-md"
                    placeholder="Aa"
                    rows="1"
                ></textarea>
            </div>
            <InputError :message="form.errors.comment" class="mt-2" />
            <div class="flex justify-end">
                <button
                    :aria-controls="article.uuid"
                    :data-drawer-hide="article.uuid"
                    class="inline-flex text-xs rounded-lg items-center font-semibold normal-case text-grey-800 transition-all dark:text-grey-600 px-3 py-3 btn btn-dark-blue hover:bg-black/10 dark:bg-blue/13 dark:text-white dark:hover:border-transparent dark:hover:bg-blue/20"
                    @click="submit"
                >
                    <svg
                        class="bi bi-send mr-1"
                        height="13"
                        viewBox="0 0 16 16"
                        width="13"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"
                            fill="#78909C"
                            fill-rule="evenodd"
                            stroke="#78909C"
                            stroke-width=".5"
                        />
                    </svg>
                    Comment
                </button>
            </div>
        </div>
    </x-pane>
    <template v-else>
        <p
            class="text-xs rounded-xl inline-block bg-slate-900 px-3 py-3 uppercase"
        >
            <a :href="route('register')" class="text-blue-500 hover:underline"
                >REGISTER</a
            >
            or
            <a :href="route('login')" class="text-blue-500 hover:underline"
                >LOGIN
            </a>
            to a leave comments.
        </p>
    </template>
</template>

<script setup>
const form = useForm({
    comment: '',
});
const submit = () => {
    form.post(route('comment.store', props.article), {
        onSuccess: () => form.reset(),
        preserveScroll: true,
    });
};
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    article: [],
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<style lang="scss" scoped></style>
