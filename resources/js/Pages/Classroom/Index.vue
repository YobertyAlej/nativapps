<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    classrooms: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route("classrooms.destroy", id));
    }
}
</script>
<template>

    <Head title="classrooms" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Classroom List
                </h2>
                <Link :href="route('classrooms.create')">
                <BreezeButton>Add Classroom</BreezeButton>
                </Link>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Schedule
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Start Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            End Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Students
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Show
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="classroom in classrooms" :key="classroom.id" class="bg-white border-b">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.id }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.name }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.schedule }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.start_date }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.end_date }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ classroom.students_count }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route('classrooms.show', classroom.id)
                                            " class="px-4 py-2 text-black bg-white border rounded-lg">Show</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route('classrooms.edit', classroom.id)
                                            " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Edit</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton class="bg-red-700" @click="destroy(classroom.id)">
                                                Delete
                                            </BreezeButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
