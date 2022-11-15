<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    student: {
        type: Object,
        default: () => ({}),
    },
});
</script>
<template>

    <Head title="Student Edit" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ `${student.first_name} ${student.last_name}` }}
                </h2>
                <div>
                    <Link :href="route('students.index')" class="mr-3">
                    <BreezeButton>Go back</BreezeButton>
                    </Link>
                    <Link :href="route('students.edit', student.id)">
                    <BreezeButton :info="false" :primary="true">Edit</BreezeButton>
                    </Link>
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-evenly flex-col md:flex-row">
                        <div class="mb-6 border-r pr-6">
                            <label for="fist_name" class="block mb-2 text-sm font-medium text-gray-900">
                                First Name
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ student.first_name }}
                            </div>
                        </div>
                        <div class="mb-6 border-r pr-6">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">
                                Last Name
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ student.last_name }}
                            </div>
                        </div>
                        <div class="mb-6 border-r pr-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Email
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ student.email }}
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">
                                Birthdate
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ student.birthdate }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>