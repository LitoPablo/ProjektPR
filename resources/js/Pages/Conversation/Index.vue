<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import {Inertia} from '@inertiajs/inertia';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    defineProps({
        conversations: {
            type: Object,
            default: {}
        }
    })

    const edit = (conversation) => {
        Inertia.get(route('conversation.edit', conversation));
    }
    const destroy = (conversation) => {
        if(confirm('czy na pewno chcesz usunąć tą konwersację?'))
        {
            Inertia.delete(route('conversation.destroy', conversation));
        }
    }
</script>
<template>
    <Head title="Welcome" />

    <AppLayout>
        <template #body>
            <div class="flex flex-col gap-4">
                <Link :href="route('conversation.create')">
                    <PrimaryButton type="button">Dodaj konwersację</PrimaryButton>
                </Link>
                <div class="grid grid-folw-row grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
                    <div v-for="conversation in conversations.data" :key="conversation.id" class="bg-red-400 p-2 rounded flex flex-col">

                        <span @click="$inertia.get(route('conversation.show', conversation))" class="cursor-pointer">
                            {{conversation.title}}
                        </span>

                        <span @click="edit(conversation)" class="cursor-pointer">
                            <i class="fa-solid fa-pen-to-square mr-1"/>
                            <span>Edytuj</span>
                        </span>

                        <span @click="destroy(conversation)" class="cursor-pointer">
                            <i class="fa-solid fa-trash-can mr-1"/>
                            <span>Usuń</span>
                        </span>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
