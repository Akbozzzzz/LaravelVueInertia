<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import toastr from "toastr";
import "toastr/build/toastr.css";

toastr.options = {
    positionClass: "toast-top-right",
    timeOut: 2000,
};

const form = reactive({
    first_name: null,
    last_name: null,
    email: null,
    password: null,
});

function submit() {
    router.post("/create/student/record", form);
    toastr.success("Form submitted successfully!");
}

defineProps({
    errors: Object,
});
</script>
<template>
    <div class="centered-container">
        <form @submit.prevent="submit" class="styled-form">
            <h2>Create Student Record</h2>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input id="first_name" v-model="form.first_name" />
                <div
                    v-if="errors.first_name"
                    :style="{ color: 'red', marginTop: '5px' }"
                >
                    {{ errors.first_name }}
                </div>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input id="last_name" v-model="form.last_name" />
                <div
                    v-if="errors.last_name"
                    :style="{ color: 'red', marginTop: '5px' }"
                >
                    {{ errors.last_name }}
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" v-model="form.email" type="email" />
                <div
                    v-if="errors.email"
                    :style="{ color: 'red', marginTop: '5px' }"
                >
                    {{ errors.email }}
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" v-model="form.password" type="password" />
                <div
                    v-if="errors.password"
                    :style="{ color: 'red', marginTop: '5px' }"
                >
                    {{ errors.password }}
                </div>
            </div>
            <button type="submit">Submit Record</button>
        </form>
    </div>
</template>

<style>
.centered-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.styled-form {
    width: 400px;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

/* button:hover {
  background-color: #2980b9;
} */
</style>
