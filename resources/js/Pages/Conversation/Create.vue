<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import InputError from "@/Components/InputError.vue"
    
    import InputText from 'primevue/inputtext';
    import Button from 'primevue/button';

    const form = useForm({
        title: '',
        email: '',
    });

    const submit = () => {
        form.post(route('conversation.store'));
    }
</script>
<template>
    <Head title="Welcome" />

    <AppLayout>
        <template #body>
            <form @submit.prevent="submit"  class="flex flex-col gap-4">
                <span class="p-float-label">
                    <InputText id="title" type="text" v-model="form.title" />
                    <label for="title">Tytuł</label>
                </span>
                <InputError :message="$page.props.errors.title" />
                
                <span class="p-float-label">
                    <InputText id="email" type="text" v-model="form.email" />
                    <label for="email">Email</label>
                </span>
                <InputError :message="$page.props.errors.email" />

                <Button type="submit" label="Utwórz" />
            </form>
        </template>
    </AppLayout>
</template>
