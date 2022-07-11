<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <Link href="/post/create" class="btn btn-md btn-primary">TAMBAH DATA</Link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in post.data" :key="post.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ post.title }}</td>
                                <td>{{ post.content }}</td>
                                <td>{{ post.author.name }}</td>
                                <td>{{ post.action }}</td>
                                <td>
                                    <Link :href="`/posts/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                                  
                                    </Link>
                                    <button @click.prevent="deletePost(`${post.id}`)"
                                        class="btn btn-sm btn-danger">DELETE</button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <Pagination class="mt-6" :links="post.links" />
            </div>
        </div>
    </div>
</template>

<script>
import LayoutApp from '../../Shared/App.vue'
import Pagination from '../../Shared/pagination.vue'

//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';

import { Inertia } from '@inertiajs/inertia'


export default {
    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Link,
        Pagination
    },

    //props
    props: {
        post: Object // <- nama props yang dibuat di controller saat parsing data
    },

    //defenisi Composition Api
    setup() {
        function deletePost(id) {
            if (confirm('Apakah anda yakin?')) {
                Inertia.delete(`/post/${id}`)
            }
        }
        return {
            deletePost
        }
    }
}
</script>

<style>
</style>
