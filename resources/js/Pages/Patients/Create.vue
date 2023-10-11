<template>
    <div>
        <h1>Create New Patient</h1>
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
            <button type="submit" class="btn btn-primary">Create Patient</button>
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
    methods: {
        submitForm() {
            // Handle form submission logic here
            // You can use Inertia.js to send a POST request to create a new patient
            // Example:
            // this.$inertia.post('/patients', this.form)
        }
    }
}
</script>

<style scoped>
/* You can add any additional styles specific to this component here */
</style>
