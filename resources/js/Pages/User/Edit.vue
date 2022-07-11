<template >
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT USER</h4>
                <hr>
                <form @submit.prevent="updateUser">
                    <div class="mb-3">
                        <label class="form-label">NAME</label>
                        <input type="text" class="form-control" v-model="user.name">
                    <div v-if="errors.name" class="mt-2 alert alert-danger">
                        {{errors.name}}
                    </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">EMAIL</label>
                        <input type="text" class="form-control" v-model="user.email" placeholder="Masukkan Email">
                        <div v-if="errors.email" class="mt-2 alert alert-danger">
                        {{errors.email}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PASSWORD</label>
                        <input type="text" class="form-control" v-model="user.password">
                    <div v-if="errors.password" class="mt-2 alert alert-danger">
                        {{errors.password}}
                    </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">UPDATE</button>
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
            user: Object,
            errors: Object
        },

 setup(props) {
        // state user
        const user = reactive({
            name: props.user.name,
            email: props.user.email,
            password: props.user.password
        })

        //function updatePost
        function updateUser(){

            //define
            let name =user.name
            let email = user.email
            let password = user.password

            //send data
            Inertia.put(`/users/${props.user.id}`, {
                name:name,
                email:email,
                password:password
            })
        }
        return {
            user,
            updateUser
        }
    },
}
</script>
