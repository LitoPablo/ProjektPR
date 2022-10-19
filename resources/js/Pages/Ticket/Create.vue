<script setup>
    import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import InputError from "@/Components/InputError.vue"
    
    import Textarea from 'primevue/textarea';
    import InputText from 'primevue/inputtext';
    import Button from 'primevue/button';
    import Dropdown from 'primevue/dropdown';

    const props = defineProps({
        ticket_levels: Object,
    })

    const form = useForm({
        title: '',
        description: '',
        ticket_level_id: null,
        user_id: usePage().props.value.auth.user.id
    });

    const submit = () => {
        form.post(route('ticket.store'));
    }
</script>
<template>
    <Head title="Konwersacje" />
    {{form}}
    <AppLayout>
        <template #body>
            <form @submit.prevent="submit"  class="flex flex-col gap-7">
                <span class="p-float-label">
                    <InputText id="title" type="text" v-model="form.title" class="w-full" />
                    <label for="title">Tytuł</label>
                </span>
                <InputError :message="$page.props.errors.title" />
                
                <span class="p-float-label">
                    <Textarea id="description" type="text" v-model="form.description" class="w-full" />
                    <label for="description">Opis</label>
                </span>
                <InputError :message="$page.props.errors.description" />
{{ticket_levels}}
                <span class="p-float-label">
                    <Dropdown id="ticket_level" v-model="form.ticket_level_id" class="w-full" :options="ticket_levels" optionLabel="name" optionValue="id">
                    </Dropdown>
                    <label for="ticket_level">Waga ticketa</label>
                </span>
                <InputError :message="$page.props.errors.ticket_level_id" />

                <Button type="submit" label="Utwórz" />
            </form>
        </template>
    </AppLayout>
</template>
