<script setup>
    import AppNav from "@/Layouts/AppNav.vue";
</script>

<template>
    <div class="min-h-screen w-screen max-w-screen flex flex-col">
        <AppNav/>

        <div class="flex flex-col gap-2 flex-grow min-w-screen bg-black bg-opacity-10">
            <div class="container mx-auto my-10 p-5 bg-white rounded-lg flex flex-col">
                <slot name="body"></slot>
            </div>
        </div>
    </div>
</template>