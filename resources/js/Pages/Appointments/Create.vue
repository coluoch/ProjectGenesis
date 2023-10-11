<template>
    <div>
        <h1>Create New Appointment</h1>
        <form @submit.prevent="createAppointment">
            <div>
                <label for="patient_id">Patient:</label>
                <select v-model="appointment.patient_id" id="patient_id" required>
                    <option v-for="patient in patients" :key="patient.id" :value="patient.id">
                        {{ patient.name }}
                    </option>
                </select>
            </div>

            <div>
                <label for="doctor_id">Doctor:</label>
                <select v-model="appointment.doctor_id" id="doctor_id" required>
                    <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
                        {{ doctor.name }}
                    </option>
                </select>
            </div>

            <div>
                <label for="appointment_date">Date:</label>
                <input type="date" v-model="appointment.appointment_date" id="appointment_date" required />
            </div>

            <div>
                <label for="appointment_time">Time:</label>
                <input type="time" v-model="appointment.appointment_time" id="appointment_time" required />
            </div>

            <div>
                <label for="status">Status:</label>
                <select v-model="appointment.status" id="status" required>
                    <option value="scheduled">Scheduled</option>
                    <option value="rescheduled">Rescheduled</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div>
                <button type="submit">Create Appointment</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            appointment: {
                patient_id: '',
                doctor_id: '',
                appointment_date: '',
                appointment_time: '',
                status: 'scheduled'
            },
            patients: [], // This should be passed as a prop or fetched from an API
            doctors: []   // This should be passed as a prop or fetched from an API
        }
    },
    methods: {
        async createAppointment() {
            try {
                // Make an API call to store the appointment
                // You can use axios or any other method to send a POST request to your backend
                const response = await axios.post('/appointments', this.appointment);
                
                if (response.data.success) {
                    this.$inertia.visit('/appointments'); // Redirect to the appointments index page
                } else {
                    // Handle any errors from the server
                    console.error(response.data.message);
                }
            } catch (error) {
                console.error("There was an error creating the appointment:", error);
            }
        }
    }
}
</script>

<style scoped>
/* Add any specific styles for this component here */
</style>
