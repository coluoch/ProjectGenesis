<template>
    <div>
        <h1>Patient Details</h1>
        <div>
            <p><strong>Name:</strong> {{ patient.name }}</p>
            <p><strong>Email:</strong> {{ patient.email }}</p>
            <p><strong>Phone:</strong> {{ patient.phone }}</p>
            <p><strong>Address:</strong> {{ patient.address }}</p>
            <p><strong>Medical History:</strong></p>
            <p>{{ patient.medical_history }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            patient: {}
        };
    },
    mounted() {
        // Fetch patient data from your API and populate the patient object
        // Example:
        // axios.get(`/api/patients/${this.$route.params.id}`)
        //     .then(response => {
        //         this.patient = response.data;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
