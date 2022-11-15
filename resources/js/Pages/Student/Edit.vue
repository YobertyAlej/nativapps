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
const form = useForm({
    id: props.student.id,
    first_name: props.student.first_name,
    last_name: props.student.last_name,
    email: props.student.email,
    birthdate: props.student.birthdate,
});
const submit = () => {
    form.put(route("students.update", props.student.id));
};
</script>
<template>

    <Head title="Student Edit" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Student Edit - {{ `${student.first_name} ${student.last_name}` }}
                </h2>
                <Link :href="route('students.show', student.id)">
                <BreezeButton>Go Back</BreezeButton>
                </Link>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="First Name" class="block mb-2 text-sm font-medium text-gray-900">First
                                    Name</label>
                                <input type="text" v-model="form.first_name" name="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.first_name" class="text-sm text-red-600">
                                    {{ form.errors.first_name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="Last Name" class="block mb-2 text-sm font-medium text-gray-900">Last
                                    Name</label>
                                <input type="text" v-model="form.last_name" name="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.last_name" class="text-sm text-red-600">
                                    {{ form.errors.last_name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="Email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="text" v-model="form.email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.email" class="text-sm text-red-600">
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="birthdate"
                                    class="block mb-2 text-sm font-medium text-gray-900">Birthdate</label>
                                <input type="date" v-model="form.birthdate" name="birthdate" id="birthdate"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <div v-if="form.errors.birthdate" class="text-sm text-red-600">
                                    {{ form.errors.birthdate }}
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>