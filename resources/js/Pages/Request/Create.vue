<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref, reactive } from 'vue';
import { event } from 'jquery';

defineProps({
  employees: {
    type: Array,
    default: () => [],
  },
  items: {
    type: Array,
    default: () => [],
  },
});

const employeeName = ref("");
const employeeDept = ref("");
const canSubmit = ref(false);

const form = useForm({
  date: null,
  employee_id: "",
  details: [],
});

const rows = reactive([
    {item:"", qty:0},{item:"", qty:0}
]);

const addRow = () => {
    rows.push({item:"", qty:0});
    canSubmit.value = false;
};

const removeRow = (row) => {
    console.log(row);
    // const x = rows.indexOf(row);
    rows.splice(row,1);
};

const createRequest = () => {
    form.details = rows;
    form.post("/requests");
};

const getEmployeeData = (employees, event) => {
    const employeeData = employees[event.target.value];
    employeeName.value = employeeData.name;
    employeeDept.value = employeeData.dept_name;
}

const getItemData = (items, idx, event) => {
    const itemData = items[event.target.value];
    rows[idx].item = event.target.value;
    rows[idx].location = itemData.loc_code;
    rows[idx].stock = itemData.stock;
    rows[idx].satuan = itemData.unit_name;
    rows[idx].available = false;
}

const checkAvailable = (row, event) => {
    // const itemData = items[idx];
    const qty = event.target.value;
    const idx = rows.indexOf(row);
    rows[idx].qty = qty;
    if (qty != "" & qty > 0) {
        rows[idx].available = row.stock > qty;
        canSubmit.value = true
    } else {
        rows[idx].available = false;
        canSubmit.value = false;
    }
    
}

</script>

<template>
    <Head title="Menambah " />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/requests"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Back</button></Link>
                        
                        <form @submit.prevent="submit">
                            <div class="flex">
                                <div class="mb-4 w-1/3 p-2">
                                    <label 
                                        class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                                        NIK Peminta:</label>
                                    <select v-model="form.employee_id" :id="employee" class="ml-2 block text-gray-700 text-sm font-bold mb-2" @change="getEmployeeData(employees, $event)">
                                        <option v-for="employee in employees" :value="employee.id">
                                            {{ employee.nik }}
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4 w-1/3 p-2">
                                    <label 
                                        class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                                        Nama:</label>
                                        <input 
                                            type="text" 
                                            :value="employeeName"
                                            class="bg-gray shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                            disabled readonly />
                                </div>

                                <div class="mb-4 w-1/3 p-2">
                                    <label 
                                        class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                                        Department:</label>
                                        <input 
                                            type="text" 
                                            :value="employeeDept"
                                            class="bg-gray shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                            disabled readonly />
                                </div>
                            </div>
                            <div class="flex">
                                <div class="mb-4 w-3/8 p-2">
                                    <label 
                                        class="ml-2 block text-gray-700 text-sm font-bold mb-2">
                                        Tanggal Permintaan:</label>
                                    <input type="datetime-local"
                                    v-model="form.date"
                                    class="bg-gray shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    />
                                </div>
                            </div>
                            <div class="">
                                <div class="font-bold">Daftar Barang</div><br>
                                <div style="overflow-x: scroll;">
                                    <table class="table-auto border-separate border border-black text-sm" style="font-size: 14px !important;">
                                        <thead>
                                            <tr>
                                                <th class="border border-gray-300">#</th>
                                                <th class="border border-gray-300 w-xl">Barang</th>
                                                <th style="width:20%" class="border border-gray-300">Lokasi</th>
                                                <th style="width:10%" class="border border-gray-300">Tersedia</th>
                                                <th style="width:10%" class="border border-gray-300">Kuantiti</th>
                                                <th class="border border-gray-300">Satuan</th>
                                                <th class="border border-gray-300">Keterangan</th>
                                                <th class="border border-gray-300">Status</th>
                                                <th class="border border-gray-300">-</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in rows">
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    <!-- <input type="text" :value="row.item"> -->
                                                    <select :id="employee" class="ml-2 block text-gray-700 text-sm font-bold mb-2" @change="getItemData(items, index, $event)">
                                                        <option :selected :disabled>Pilih barang</option>
                                                        <option v-for="item in items" :value="item.id">
                                                            {{ item.select }}
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="text-center">
                                                    <input style="max-width: 90px;" :value="row.location" readonly type="text">
                                                </td>
                                                <td class="text-center">
                                                    <input style="max-width: 50px;" :value="row.stock" readonly type="text">
                                                </td>
                                                <td class="text-center">
                                                    <input style="max-width: 50px;" type="text" :value="row.qty" @keyup="checkAvailable(row, $event)">
                                                </td>
                                                <td><input :value="row.satuan" readonly type="text"></td>
                                                <td><input v-model="row.notes" type="text"></td>
                                                <td>
                                                    <span v-if="!row.available" class="bg-red-400">Tidak</span>
                                                    <span v-if="row.available" class="bg-green-400">Tersedia</span>
                                                </td>
                                                <td>
                                                    <DangerButton type="button" @click="removeRow(index)" class="fa fa-remove delete-button">
                                                        <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </DangerButton>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <PrimaryButton @click="addRow" class="flex justify-end">Tambah</PrimaryButton>
                        <div class="mt-6 flex justify-center">
                            <Link href="/requests"><SecondaryButton>
                                Batal
                            </SecondaryButton></Link>

                            <PrimaryButton
                                class="ms-3"
                                v-if="canSubmit"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                                @click="createRequest"
                            >
                                Proses
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
