<template>
        <Head>
            <title>Users</title>
        </Head>
        <h1 class="text-3xl">
            Users
        </h1>
        <div style="margin-top: 400px;">
            <p>THe current time is {{ time }}.</p>

            <Link href="/users" class="text-blue-500" preserve-scroll>
                Refresh
            </Link>
            <Link href="/users" class="text-blue-500">
                <img class="w-10" src="/images/arrow-circle-up.svg">
            </Link>
        </div>
</template>

<script>
import Layout from '../Shared/Layout.vue';


export default {
    layout: Layout,

    props: {time: String}
}
</script>

<style scoped>

</style>
