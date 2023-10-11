<template>
    <div>
        <h1>Appointment Details</h1>
        <div>
            <strong>Patient:</strong> {{ appointment.patient_name }}
        </div>
        <div>
            <strong>Doctor:</strong> {{ appointment.doctor_name }}
        </div>
        <div>
            <strong>Date:</strong> {{ appointment.appointment_date }}
        </div>
        <div>
            <strong>Time:</strong> {{ appointment.appointment_time }}
        </div>
        <div>
            <strong>Status:</strong> {{ appointment.status }}
        </div>
        <button @click="goBack">Back to Appointments</button>
    </div>
</template>

<script>
export default {
    props: {
        appointment: {
            type: Object,
            required: true
        }
    },
    methods: {
        goBack() {
            this.$inertia.visit('/appointments'); // Redirect to the appointments index page
        }
    }
}
</script>

<style scoped>
/* Add any specific styles for this component here */
</style>
