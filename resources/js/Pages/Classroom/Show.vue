<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    classroom: {
        type: Object,
        default: () => ({}),
    },
});

const back = () => {
    window.history.back();
};

</script>
<template>

    <Head title="Classroom Edit" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ `${classroom.name}` }}
                </h2>
                <div>
                    <Link @click="back()" class="mr-3">
                    <BreezeButton>Go back</BreezeButton>
                    </Link>
                    <Link :href="route('classrooms.edit', classroom.id)">
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
                                Name
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ classroom.name }}
                            </div>
                        </div>
                        <div class="mb-6 border-r pr-6">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">
                                Schedule
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ classroom.schedule }}
                            </div>
                        </div>
                        <div class="mb-6 border-r pr-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Start Date
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ classroom.start_date }}
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">
                                End Date
                            </label>
                            <div class="text-sm text-gray-900 font-bold">
                                {{ classroom.end_date }}
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">
                                Students
                            </label>
                            <div class="text-sm text-gray-900 font-bold flex flex-col">
                                <span v-if="!classroom.students">
                                    No students assigned
                                </span>
                                <template v-for="student in classroom.students">
                                    <Link :href="route('students.show', student.id)">
                                    <span>{{ `${student.first_name} ${student.last_name}` }}</span>
                                    </Link>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>