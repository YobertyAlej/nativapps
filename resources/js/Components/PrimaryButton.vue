<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
    info: {
        type: Boolean,
        default: true
    },
    primary: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <button :type="type"
        :class="{ 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150': true, 'bg-gray-800 focus:border-gray-900 hover:bg-gray-700 active:bg-gray-900': info, 'bg-blue-600 focus:border-blue-900 hover:bg-blue-700': primary }">
        <slot />
    </button>
</template>
