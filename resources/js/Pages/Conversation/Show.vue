<script setup>
    import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import InputError from "@/Components/InputError.vue"
    
    import InputText from 'primevue/inputtext';
    import Button from 'primevue/button';
    import Textarea from 'primevue/textarea';
    import moment from 'moment'

    const props = defineProps({
        conversation: Object
    })

    const form = useForm({
        message: '',
        conversation_id: props.conversation.id,
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
            <!-- {{conversation}} -->
            <p class="text-center text-violet-500 text-2xl font-bold">{{conversation.title}}</p>
            <div class="flex flex-col gap-10">
                <div 
                    v-for="message in conversation.messages" 
                    :key="message.id" 
                    :class="{
                        'self-start text-start': !isAuthor(message), 
                        'self-end text-end':isAuthor(message),
                        }"
                    class="p-3 flex flex-col"
                >
                    <span>{{message.user.name}}</span>
                    <div
                        :class="{
                            'marker:bg-black bg-opacity-10': !isAuthor(message), 
                            'bg-blue-300 rounded-l-lg':isAuthor(message),
                        }"
                        class="p-2 flex flex-col"
                    >
                        <span class="" :title="moment(message.created_at).format('LT')">{{message.message}}</span>
                    </div>
                    
                </div>
            </div>
            <form @submit.prevent="submit" class="flex flex-col gap-4 mt-10">
                <Textarea v-model="form.message" :autoResize="true" rows="5" cols="30" />
                <Button type="submit" label="Wyślij"/>
            </form>
        </template>
    </AppLayout>
</template>
