<template>
    <div>
        <h1>Appointments</h1>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="appointment in appointments" :key="appointment.id">
                    <td>{{ appointment.patient.name }}</td>
                    <td>{{ appointment.doctor.name }}</td>
                    <td>{{ appointment.appointment_date }}</td>
                    <td>{{ appointment.appointment_time }}</td>
                    <td>{{ appointment.status }}</td>
                    <td>
                        <a :href="'/appointments/' + appointment.id + '/edit'">Edit</a>
                        <!-- Add other actions like "Show" or "Delete" if needed -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        appointments: Array
    }
}
</script>

<style scoped>
/* Add any specific styles for this component here */
</style>
