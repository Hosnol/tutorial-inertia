<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <Link href="/users/create" class="btn btn-md btn-primary">TAMBAH DATA</Link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users" :key="user.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td class="text-center">
                                <Link :href="`/users/${user.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutApp from '../Layouts/App.vue'

//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';

export default {
    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Link
    },

    //props
    props: {
        users: Array // <- nama props yang dibuat di controller saat parsing data
    }
}
</script>

<style>
</style>
