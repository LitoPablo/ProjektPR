<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
</script>
<template>
    <Head title="Welcome" />

    <AppLayout>
        <template #body>
            <span class="text-2xl font-bold">
                strona startowa :V  
            </span>
        </template>
    </AppLayout>
</template>
