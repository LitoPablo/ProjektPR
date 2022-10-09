<script setup>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AppLayout from "@/Layouts/AppLayout.vue"
    import InputError from "@/Components/InputError.vue"
    
    import InputText from 'primevue/inputtext';
    import Button from 'primevue/button';

    const props = defineProps({
        conversation: Object
    })

    const form = useForm({
        title: props.conversation.title,
    });

    const submit = () => {
        form.put(route('conversation.update', props.conversation));
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

                <Button type="submit" label="Edytuj" />
            </form>
        </template>
    </AppLayout>
</template>
