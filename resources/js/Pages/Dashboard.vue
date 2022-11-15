<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    top_courses: {
        type: Array,
        default: []
    },
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-lg">
                        Top 3 Courses in the last 6 months
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between"
                        v-for="course in top_courses">
                        <span>Name: <span class="font-bold">{{ course.name }}</span></span>
                        <span>Number of students: <span class="font-bold">{{ course.students_count }}</span></span>
                        <Link :href="route('classrooms.show', course.id)">
                        <BreezeButton>Visit</BreezeButton>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
