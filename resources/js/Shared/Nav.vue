<template>
    <nav class="mt-6">
        <ul class="list-disc">
            <li><Link href="/" class="text-blue-500 hover:underline">Home</link></li>
            <li><Link href="/users" class="text-blue-500 hover:underline">Users</link></li>
            <li><Link href="/settings" class="text-blue-500 hover:underline">Settings</link></li>
            <li><Link href="/logout" method="post" :data="{foo: 'bar'}" as="button" class="text-blue-500 hover:underline">Log Out</link></li>
        </ul>
    </nav>
</template>

<script>

import {Link} from '@inertiajs/vue3';
export default {
    name: "nav",
    components:{ Link },
};
</script>

<style scoped>

</style>
