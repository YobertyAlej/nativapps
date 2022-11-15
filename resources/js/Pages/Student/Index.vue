<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    students: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm();
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route("students.destroy", id));
    }
}
</script>
<template>

    <Head title="students" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Student List
                </h2>
                <Link :href="route('students.create')">
                <BreezeButton>Add Student</BreezeButton>
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
                                            First Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Last Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
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
                                    <tr v-for="student in students" :key="student.id" class="bg-white border-b">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ student.id }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ student.first_name }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ student.last_name }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ student.email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route('students.show', student.id)
                                            " class="px-4 py-2 text-black bg-white border rounded-lg">Show</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route('students.edit', student.id)
                                            " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Edit</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton class="bg-red-700" @click="destroy(student.id)">
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
