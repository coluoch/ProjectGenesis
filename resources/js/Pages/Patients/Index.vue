<template>
    <div>
        <h1>Patients List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="patient in patients" :key="patient.id">
                    <td>{{ patient.name }}</td>
                    <td>{{ patient.email }}</td>
                    <td>{{ patient.phone }}</td>
                    <td>{{ patient.address }}</td>
                    <td>
                        <inertia-link :href="`/patients/${patient.id}`">View</inertia-link> |
                        <inertia-link :href="`/patients/${patient.id}/edit`">Edit</inertia-link>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--<inertia-link :href="route('patients.create')" class="btn btn-primary">Add New Patient</inertia-link>-->
    </div>
</template>

<script>
export default {
    props: {
        patients: Array
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
