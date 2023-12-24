<script setup>
// import { reactive } from "vue";
import { reactive, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import toastr from "toastr";
import "toastr/build/toastr.css";


toastr.options = {
    positionClass: "toast-top-right",
    timeOut: 2000,
};

const props = defineProps(["studenteditRecord"]);

const form = reactive({
    id : null,
    first_name: null,
    last_name: null,
});

const submitForm = (id) => {
    router.put('/student/update/' + form.id, form);
    toastr.success("Record Update successfully!");
};

onMounted(() => {
    if (props.studenteditRecord) {
        form.id = props.studenteditRecord.id;
        form.first_name = props.studenteditRecord.first_name;
        form.last_name = props.studenteditRecord.last_name;
    }
});
</script>
<template>
    <div class="centered-container">
        <form @submit.prevent="submitForm" class="styled-form">
            <h2>Create Student Record</h2>
            <input type="hidden" id="first_name" v-model="form.id" />
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input id="first_name" v-model="form.first_name" />
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input id="last_name" v-model="form.last_name" />
            </div>

            <button type="submit">Submit Record</button>
            <br />
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
    max-width: 400px;
    width: 100%;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.styled-form h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}
</style>
