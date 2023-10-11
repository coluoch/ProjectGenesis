<template>
    <div>
        <h1 class="text-xl font-bold mb-4">Edit Doctor</h1>

        <form @submit.prevent="updateDoctor">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" v-model="doctor.name" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" v-model="doctor.email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                <input type="text" v-model="doctor.specialization" id="specialization" name="specialization" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update Doctor</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        doctor: {
            type: Object,
            required: true
        }
    },
    methods: {
        async updateDoctor() {
            try {
                await this.$inertia.put(`/doctors/${this.doctor.id}`, this.doctor);
                // Handle success, e.g., show a notification or redirect
            } catch (error) {
                // Handle error, e.g., show an error message
            }
        }
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
