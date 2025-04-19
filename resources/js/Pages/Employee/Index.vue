<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Modal from "@/Components/Modal.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { reactive, ref } from 'vue';

defineProps({
  lists: {
    type: Array,
    default: () => [],
  },
});

const columns = [
    { data: 'nik', align: 'left', className: 'dt-left' },
    { data: 'name' },
    { data: 'dept' },
];

</script>

<template>
    <Head title="Manage Requests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Permintaan Barang</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div v-if="$page.props.flash.message" class="fixed top-0 right-0 m-6">
                            <div
                                class="bg-yellow-200 text-black-900 rounded-lg shadow-md p-6 pr-10"
                                style="min-width: 240px"
                                >
                                <button
                                    class="opacity-75 cursor-pointer absolute top-0 right-0 py-2 px-3 hover:opacity-100"
                                >
                                    ×
                                </button>
                                <div class="flex items-center">
                                    {{ $page.props.flash.message }}
                                </div>
                            </div>
                        </div>
                        <DataTable
                            :data="lists"
                            :columns="columns"
                        >
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                        </DataTable>
                    </div>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
<style>
@import 'datatables.net-dt';
</style>