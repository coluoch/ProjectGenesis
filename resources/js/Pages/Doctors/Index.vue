<template>
    <div>
        <h1 class="text-xl font-bold mb-4">List of Doctors</h1>
        
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Specialization</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="doctor in doctors" :key="doctor.id">
                    <td class="border px-4 py-2">{{ doctor.name }}</td>
                    <td class="border px-4 py-2">{{ doctor.email }}</td>
                    <td class="border px-4 py-2">{{ doctor.specialization }}</td>
                    <td class="border px-4 py-2">
                        <router-link :to="{ name: 'doctors.show', params: { id: doctor.id } }" class="text-blue-500 hover:underline">View</router-link>
                        <router-link :to="{ name: 'doctors.edit', params: { id: doctor.id } }" class="ml-4 text-yellow-500 hover:underline">Edit</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        doctors: Array
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
