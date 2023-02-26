<template>
    <Head>
        <title>Login Page</title>
    </Head>

    <main class="min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md max-auto m-auto">
            <h1 class="text-3xl font-bold my-4">
                Login
            </h1>
            <form @submit.prevent="submit" class=" bg-gray-200 rounded p-6 mt-8">
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
                           required
                    >
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
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
                           required
                    >
                    <div v-if="form.errors.password" v-text="$page.props.errors.password" class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        :disabled="form.processing"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>
<script>
    import Layout from "../../Shared/Layout.vue";

    export default {
        layout: null,
    };
</script>
<script setup>
   import {useForm} from "@inertiajs/vue3";

   let form = useForm({
       email: '',
       password: ''
   });

   let submit = () => {
     form.post('/login');
   };
</script>
