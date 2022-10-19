<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import {Inertia} from '@inertiajs/inertia';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import moment from 'moment'

    defineProps({
        tickets: {
            type: Object,
            default: {}
        }
    })

    const edit = (ticket) => {
        Inertia.get(route('ticket.edit', ticket));
    }
    const destroy = (ticket) => {
        if(confirm('czy na pewno chcesz usunąć tą konwersację?'))
        {
            Inertia.delete(route('tickets.destroy', tickets));
        }
    }
</script>
<template>
    <Head title="Konwersacje" />

    <AppLayout>
        <template #body>
            <div class="flex flex-col gap-4">
                <Link :href="route('ticket.create')">
                    <PrimaryButton type="button">Dodaj ticket</PrimaryButton>
                </Link>
                <div class="grid grid-folw-row grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
                    <div v-for="ticket in tickets.data" :key="ticket.id" class="p-3 rounded flex flex-col justify-between gap-4" :class="{'bg-red-500': ticket.ticket_level_id == 1, 'bg-orange-500': ticket.ticket_level_id == 2, 'bg-green-500': ticket.ticket_level_id == 3}">
                        <div class="flex flex-row gap-4 items-center justify-between">
                                <span class="truncate" v-text="ticket.ticket_status.name" />
                                <small class="font-light">
                                    {{moment(ticket.created_at).format('HH:mm DD.MM.YYYY')}}
                                </small>
                        </div>
                        <span @click="$inertia.get(route('ticket.show', ticket))" class="cursor-pointer text-xl font-semibold" v-html="ticket.title"/>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
