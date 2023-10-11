<template>
    <div>
        <h1 class="text-xl font-bold mb-4">Doctor Details</h1>

        <div class="mb-4">
            <strong>Name:</strong>
            <span>{{ doctor.name }}</span>
        </div>

        <div class="mb-4">
            <strong>Email:</strong>
            <span>{{ doctor.email }}</span>
        </div>

        <div class="mb-4">
            <strong>Specialization:</strong>
            <span>{{ doctor.specialization }}</span>
        </div>

        <a href="#" @click.prevent="editDoctor" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit Doctor</a>
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
        editDoctor() {
            this.$inertia.visit(`/doctors/${this.doctor.id}/edit`);
        }
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
