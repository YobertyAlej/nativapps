<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    classrooms: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    name: '',
    schedule: '',
    start_date: '',
    end_date: ''
});
const submit = () => {
    form.post(route("classrooms.store"));
};
const back = () => {
    window.history.back();
};
</script>
<template>

    <Head title="Classroom Create" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Classroom Create
                </h2>
                <Link @click="back()">
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
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" v-model="form.name" name="first_name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.name" class="text-sm text-red-600">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="schedule"
                                    class="block mb-2 text-sm font-medium text-gray-900">Schedule</label>
                                <input type="text" v-model="form.schedule" name="last_name" id="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.schedule" class="text-sm text-red-600">
                                    {{ form.errors.schedule }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Start
                                    Date</label>
                                <input type="date" v-model="form.start_date" name="start_date" id="start_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <div v-if="form.errors.start_date" class="text-sm text-red-600">
                                    {{ form.errors.start_date }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">End
                                    Date</label>
                                <input type="date" v-model="form.end_date" name="end_date" id="end_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <div v-if="form.errors.end_date" class="text-sm text-red-600">
                                    {{ form.errors.end_date }}
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