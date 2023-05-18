<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    nickname: user.nickname,
    phone: user.phone,
    username: user.username,
    email: user.email,
    bio: user.bio,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Change Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 p-3">
                Update your account's profile information and email address.
            </p>
        </header>
        <form @submit.prevent="form.patch(route('profile.update',$page.props.auth.user))"
              class="mt-6 space-y-3">
            <div class="flex w-full flex-wrap">
                <div class="mt-2 flex w-1/2 flex-col pr-2">
                    <InputLabel for="first_name"
                                value="First Name"/>
                    <TextInput id="first_name"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.first_name"
                               autofocus
                               autocomplete="first_name"/>

                    <InputError class="mt-2"
                                :message="form.errors.first_name"/>
                </div>

                <div class="mt-2 flex w-1/2 flex-col pl-2">
                    <InputLabel
                        for="last_name"
                        value="Last Name"/>
                    <TextInput id="last_name"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.last_name"
                               autofocus
                               autocomplete="last_name"/>
                    <InputError class="mt-2"
                                :message="form.errors.last_name"/>
                </div>
            </div>
            <div class="flex w-full flex-wrap">
                <div class="mt-2 flex w-1/2 flex-col pr-2">
                    <InputLabel for="nickname"
                                value="Nickname"/>
                    <TextInput id="nickname"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.nickname"
                               autofocus
                               autocomplete="nickname"/>
                    <InputError class="mt-2"
                                :message="form.errors.nickname"/>
                </div>

                <div class="mt-2 flex w-1/2 flex-col pl-2">
                    <InputLabel for="phone"
                                value="Phone Number"/>
                    <TextInput id="phone"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.phone"
                               autofocus
                               autocomplete="phone"/>

                    <InputError class="mt-2"
                                :message="form.errors.phone"/>
                </div>
            </div>
            <div>
                <InputLabel for="username" value="Name"/>

                <TextInput id="username"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.username"
                           autofocus
                           autocomplete="username"/>
                <InputError class="mt-2"
                            :message="form.errors.username"/>
            </div>
            <div>
                <InputLabel for="email"
                            value="Email"/>
                <TextInput id="email"
                           type="email"
                           class="mt-1 block w-full"
                           v-model="form.email"
                           autocomplete="username"/>
                <InputError class="mt-2"
                            :message="form.errors.email"/>
            </div>
            <div class="">
                <InputLabel for="bio"
                            value="Bio"/>
                <div class="mt-1">
                    <textarea v-model="form.bio"
                              class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-sm focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md"
                              id="bio"
                              rows="3"
                              placeholder="Aa"></textarea>
                </div>
                <InputError class="mt-2" :message="form.errors.bio"/>
            </div>
            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    Your email address is unverified.
                    <Link :href="route('verification.send')" method="post" as="button"
                          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        Click here to re-send the verification email.
                    </Link>
                </p>
                <div v-show="status === 'verification-link-sent'"
                     class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <PrimaryButton :disabled="form.processing">Update Profile</PrimaryButton>
                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
