<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>TAMBAH POST</h4>
                <hr>
                <form @submit.prevent="storeUser">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" placeholder="Masukkan Title">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Comments</label>
                        </div>
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div v-if="errors.penulis" class="mt-2 alert alert-danger">
                            {{ errors.penulis }}
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

    // //define Composition Api
    // setup() {

    //     //state user
    //     const user = reactive({
    //         title: '',
    //         content: '',
    //         penulis: ''
    //     })

    // //function storeUser
    // function storePost() {

    //     //define variable
    //     let title   = post.title
    //     let content = post.content
    //     let penulis = post.penulis

    //     //send data
    //     Inertia.post('/posts', {
    //         title: title,
    //         content: content,
    //         penulis: penulis
    //     })

    // }

    // return {
    //     user,
    //     storeUser
    // }

}

</script>
