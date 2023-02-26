<template>
    <Head>
        <title>Create User</title>
    </Head>

    <h1 class="text-3xl my-4">
        Create New User
    </h1>

    <form @submit.prevent="submit" class="max-w-md max-auto m-auto bg-gray-200 rounded p-6 mt-8">
        <div class="mb-6">
            <label class="bolck  uppercase font-bold text-xs text-gray-700"
                   for= "name"
        >
            Name:
        </label>

            <input v-model="form.name"
                   type="text"
                   class="border border-gray-400 rounded-xl h-9 my-3 w-full"
                   name="name"
                   id="name"

            >
            <div v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="bolck  uppercase font-bold text-xs text-gray-700"
                   for= "email"
            >
                Email:
            </label>

            <input v-model="form.email"
                   type="email"
                   class="border border-gray-400 rounded-xl h-9 my-3 w-full"
                   name="email"
                   id="email"

            >
            <div v-if="errors.email" v-text="$page.props.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="bolck  uppercase font-bold text-xs text-gray-700"
                   for= "password"
            >
                Password:
            </label>

            <input v-model="form.password"
                   type="password"
                   class="border border-gray-400 rounded-xl h-9 my-3 w-full"
                   name="password"
                   id="password"

            >
            <div v-if="$page.props.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button
                type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                :disabled="form.processing"
            >
                Submit
            </button>
        </div>
    </form>
</template>

<script>
import Layout from '../../Shared/Layout.vue';
export default {
    layout: Layout,
}
</script>

<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    name: '',
    email: '',
    password: '',
});


let submit = () => {
    form.post('/users');
};
defineProps({
    errors: Object
});
</script>

<style scoped>

</style>
