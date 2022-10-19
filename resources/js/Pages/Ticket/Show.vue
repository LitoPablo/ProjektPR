<script setup>
    import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import InputError from "@/Components/InputError.vue"
    
    import InputText from 'primevue/inputtext';
    import Button from 'primevue/button';
    import Textarea from 'primevue/textarea';
    import moment from 'moment'

    const props = defineProps({
        ticket: Object
    })

    const form = useForm({
        message: '',
        ticket_id: props.ticket.id,
        user_id: usePage().props.value.auth.user.id,
    });

    const submit = () => {
        form.post(route('message.store'));
    }

    const isAuthor = (message) => {
        return message.user_id == usePage().props.value.auth.user.id
    }
</script>
<template>
    <Head title="Welcome" />
    <AppLayout>
        <template #body>
            <!-- {{ticket}} -->
            <div class="flex flex-col gap-4 justify-center">
                <div class="flex flex-row justify-between items-center">
                    <p class="text-start text-violet-500 text-2xl font-bold">{{ticket.title}} 
                        <span @click="destroy(ticket)" class="cursor-pointer text-red-500">
                            <i class="fa-solid fa-trash-can text-xl"/>
                        </span>
                    </p>
                    <p class="font-semibold">{{moment(ticket.created_at).format('HH:mm DD.MM.YYYY')}}</p>
                </div>
                <p class="bg-black bg-opacity-10 p-2 rounded">{{ticket.description}}</p>
            </div>

            
            <div class="flex flex-col border mt-7 rounded">
                <div 
                    v-for="message in ticket.messages" 
                    :key="message.id" 
                    :class="{
                        'self-start text-start': !isAuthor(message), 
                        'self-end text-end':isAuthor(message),
                        }"
                    class="p-3 flex flex-col"
                >
                    <span v-html="message.user.name" />
                    <div
                        :class="{
                            'bg-black bg-opacity-10 rounded-r-lg': !isAuthor(message), 
                            'bg-blue-300 rounded-l-lg':isAuthor(message),
                        }"
                        class="p-2 flex flex-col"
                    >
                        <span class="" :title="moment(message.created_at).format('LT')" v-html="message.message" />
                        <small v-text="moment(message.created_at).format('LT')" />
                    </div>
                    
                </div>
            </div>
            <form @submit.prevent="submit" class="flex flex-col gap-4 mt-10">
                <Textarea v-model="form.message" :autoResize="true" rows="2" cols="30" :disabled="ticket.ticket_status_id == 4"/>
                <Button type="submit" label="Wyślij" :disabled="ticket.ticket_status_id == 4"/>
            </form>
        </template>
    </AppLayout>
</template>
