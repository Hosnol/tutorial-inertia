<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>TAMBAH USER</h4>
                <hr>
                <form @submit.prevent="storeUser">
                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input type="text" class="form-control" v-model="user.name" placeholder="Masukkan Nama">
                        <div v-if="errors.name" class="mt-2 alert alert-danger">
                            {{ errors.name }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">EMAIL</label>
                        <input class="form-control" v-model="user.email" placeholder="Masukkan email">
                        <div v-if="errors.email" class="mt-2 alert alert-danger">
                            {{ errors.email }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PASSWORD</label>
                        <input class="form-control" v-model="user.password" placeholder="Masukkan Password">
                        <div v-if="errors.password" class="mt-2 alert alert-danger">
                            {{ errors.password }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">SIMPAN</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutApp from '../../Shared/App.vue'

    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            errors: Object
        },

        //define Composition Api
        setup() {

            //state user
            const user = reactive({
                name: '',
                email: '',
                password: ''
            })

            //function storeUser
            function storeUser() {

                //define variable
                let name   = user.name
                let email = user.email
                let password = user.password

                //send data
                Inertia.post('/users', {
                    name: name,
                    email: email,
                    password: password
                })

            }

            return {
                user,
                storeUser
            }

        }
    }
</script>
