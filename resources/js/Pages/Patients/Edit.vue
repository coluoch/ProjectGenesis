<template>
    <div>
        <h1>Edit Patient</h1>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="form.name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" v-model="form.email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" v-model="form.phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" v-model="form.address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="medical_history">Medical History:</label>
                <textarea id="medical_history" v-model="form.medical_history" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Patient</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                address: '',
                medical_history: ''
            }
        };
    },
    mounted() {
        // Fetch patient data from your API and populate the form fields
        // Example:
        // axios.get(`/api/patients/${this.$route.params.id}`)
        //     .then(response => {
        //         this.form = response.data;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
    },
    methods: {
        submitForm() {
            // Handle form submission logic here
            // You can use Inertia.js to send a PUT request to update the patient's information
            // Example:
            // this.$inertia.put(`/patients/${this.$route.params.id}`, this.form)
        }
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
