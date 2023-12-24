<script setup>
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import toastr from "toastr";
import "toastr/build/toastr.css";

toastr.options = {
    positionClass: "toast-top-right",
    timeOut: 2000,
};

defineProps({
    errors: Object,
    students: Array,
});


const handleDelete = (studentId) => {
    router.delete(`/student/delete/${studentId}`);
    toastr.success("Delete Record successfully!");
};
</script>

<template>
    <div class="dashboard">
        <Head title="Dashboard" />
        <!-- <AuthenticatedLayout> -->
        <nav class="dashboard-nav">
            <Link href="create/student/record">Create Student Record</Link>
        </nav>
        <table>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <tr v-for="student in students">
                <td>{{ student.email }}</td>
                <td>{{ student.email }}</td>
                <td>{{ student.email }}</td>
                <td><a href="">Edit</a></td>
                <td @click="handleDelete(student.id)">Delete</td>
            </tr>
        </table>
        <!-- </AuthenticatedLayout> -->
    </div>
</template>

<style scoped>
.dashboard {
    font-family: "Arial", sans-serif;
    background-color: #f4f4f4;
    color: #333333;
    padding: 20px;
}

.dashboard-nav {
    background-color: #333333;
    color: #fff;
    padding: 10px;
}

.dashboard-nav a {
    color: #fff;
    text-decoration: none;
    margin-right: 20px;
}

.dashboard-nav a:hover {
    text-decoration: underline;
}
</style>
