<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Modal from "@/Components/Modal.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { reactive, ref } from 'vue';

defineProps({
  requests: {
    type: Array,
    default: () => [],
  },
});

const form = useForm({});

const openRequest = ref(false);
const reqData = reactive({});

const closeModal = () => {
    openRequest.value = false;

    form.clearErrors();
    form.reset();
};

const openPost = (id) => {
    const response = axios.get('/requests/' + id).then(response => {
        openRequest.value = true;
        reqData.value = response.data;
        console.log(reqData);
    })
    // nextTick(() => passwordInput.value.focus());
};

const columns = [
    { data: 'request_number', align: 'left', className: 'dt-left' },
    { data: 'name' },
    { data: 'date' },
    { data: 'action', orderable: false, className: 'dt-center' }
];

const deletePost = (id) => {
    if(confirm("Do you really want to delete?")){
        form.delete(`requests/${id}`);
    }
};

const createRequest = () => {
    form.post(route('requests.store'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

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
                        <Link href="requests/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</button></Link>
                        <div class="p-6 text-gray-900">
                        <DataTable
                            :data="requests"
                            :columns="columns"
                        >
                            <thead>
                                <tr>
                                    <th>Request Number</th>
                                    <th>Name</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <template #column-3="props">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" @click="openPost(props.rowData.id)">Lihat</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" @click="deletePost(props.rowData.id)">Hapus</button>
                            </template>
                        </DataTable>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal class="w-4xl" :show="openRequest" @close="closeModal">
            <div class="title flex justify-start bg-black text-white">
                <span class="pl-1 text-lg">
                    Tambah penerimaan barang
                </span>
                <span class="absolute top-0 right-0 size-16">
                    <DangerButton @click="closeModal">
                        <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </DangerButton>
                </span>
            </div>
            <div class="p-6">
                <div class="flex">
                    <div class="mb-4 w-1/3 p-2">
                        <label 
                            for="title" 
                            class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                            NIK Peminta:</label>
                        <span>{{ reqData.value.nik }}</span>

                    </div>

                    <div class="mb-4 w-1/3 p-2">
                        <label 
                            for="body" 
                            class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                            Nama:</label>
                            <span>{{ reqData.value.employee }}</span>
                    </div>

                    <div class="mb-4 w-1/3 p-2">
                        <label 
                            for="body" 
                            class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                            Department:</label>
                            <span>{{ reqData.value.dept }}</span>
                    </div>
                </div>
                <div class="">
                    <div class="font-bold">Daftar Barang</div><br>
                    <table class="border-separate border border-black text-sm">
                        <thead>
                            <tr>
                                <th class="border border-gray-300">#</th>
                                <th class="border border-gray-300">Barang</th>
                                <th class="border border-gray-300">Lokasi</th>
                                <th class="border border-gray-300">Kuantiti</th>
                                <th class="border border-gray-300">Satuan</th>
                                <th class="border border-gray-300">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(detail, x) in reqData.value.details">
                                <td>{{ x + 1 }}</td>
                                <td><span>{{ detail.item }}</span></td>
                                <td><span>{{ detail.location }}</span></td>
                                <td><span>{{ detail.qty }}</span></td>
                                <td><span>{{ detail.unit_name }}</span></td>
                                <td><span>{{ detail.notes }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
<style>
@import 'datatables.net-dt';
</style>