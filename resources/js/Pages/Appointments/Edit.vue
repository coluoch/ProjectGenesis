<template>
    <div>
        <h1>Edit Appointment</h1>
        <form @submit.prevent="updateAppointment">
            <div>
                <label for="patient">Patient:</label>
                <select v-model="appointment.patient_id" id="patient">
                    <option v-for="patient in patients" :key="patient.id" :value="patient.id">
                        {{ patient.name }}
                    </option>
                </select>
            </div>
            <div>
                <label for="doctor">Doctor:</label>
                <select v-model="appointment.doctor_id" id="doctor">
                    <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
                        {{ doctor.name }}
                    </option>
                </select>
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" v-model="appointment.appointment_date" id="date" required>
            </div>
            <div>
                <label for="time">Time:</label>
                <input type="time" v-model="appointment.appointment_time" id="time" required>
            </div>
            <div>
                <label for="status">Status:</label>
                <select v-model="appointment.status" id="status">
                    <option value="scheduled">Scheduled</option>
                    <option value="rescheduled">Rescheduled</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit">Update Appointment</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        appointment: {
            type: Object,
            required: true
        },
        doctors: {
            type: Array,
            required: true
        },
        patients: {
            type: Array,
            required: true
        }
    },
    methods: {
        async updateAppointment() {
            // Send a request to the server to update the appointment
            // You can use axios or any other method to send the request
            // After a successful update, redirect to the appointments index page or show a success message
        }
    }
}
</script>

<style scoped>
/* Add any specific styles for this component here */
</style>
