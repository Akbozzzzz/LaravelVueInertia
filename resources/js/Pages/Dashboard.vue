<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="dashboard">
        <Head title="Dashboard" />
        <AuthenticatedLayout>
            <nav class="dashboard-nav">
                <!-- <Link href="create/student/record">Create Student Record</Link> -->
                <Link href="/student">Student</Link>
            </nav>
        </AuthenticatedLayout>
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
