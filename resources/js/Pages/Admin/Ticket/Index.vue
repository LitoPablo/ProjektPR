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

</script>
<template>
    <Head title="Konwersacje" />

    <AppLayout>
        <template #body>
            <div class="flex flex-col gap-4">
                <!-- <Link :href="route('ticket.create')">
                    <PrimaryButton type="button">Dodaj ticket</PrimaryButton>
                </Link> -->
                <div class="grid grid-folw-row grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
                    <div v-for="ticket in tickets.data" :key="ticket.id" class="p-3 rounded flex flex-row justify-between" :class="{'bg-red-500': ticket.ticket_level_id == 1, 'bg-orange-500': ticket.ticket_level_id == 2, 'bg-green-500': ticket.ticket_level_id == 3}">

                        <div class="flex flex-col gap-4">
                            <span @click="$inertia.get(route('admin.ticket.show', ticket))" class="cursor-pointer font-light">
                                {{moment(ticket.created_at).format('HH:mm DD.MM.YYYY')}}
                            </span>
                            <span @click="$inertia.get(route('admin.ticket.show', ticket))" class="cursor-pointer text-xl font-semibold">
                                {{ticket.title}}
                            </span>
                        </div>
                        <div class="flex flex-col gap-4">

                            <!-- <span @click="destroy(ticket)" class="cursor-pointer">
                                <i class="fa-solid fa-trash-can text-xl"/>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
