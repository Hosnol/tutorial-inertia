<template >
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT Content</h4>
                <hr>
                <form @submit.prevent="updateUser">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" v-model="post.title">
                 
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" rows="3" v-model="post.content" placeholder="Masukkan Content"></textarea>
              
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                      	<select name="" class="form-control">
		                    <option value="">Contoh Form Dropdown</option>
		                    <option value="">Contoh 1</option>
		                    <option value="">Contoh 2</option>
		                    <option value="">Contoh 3</option>
	                    </select>
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
            post: Object,
   
        },

 setup(props) {
        // state post
        const post = reactive({
            title: props.post.title,
            content: props.post.content,
            author: props.post.author.name
        })

        //function updatePost
        function updateUser(){

            //define
            let title =post.title
            let content = post.content
            let author = post.author.name

            //send data
            Inertia.put(`/post/${props.post.id}`, {
                title:title,
                content:content,
                author:author.id
            })
        }
        return {
            post,
            updateUser
        }
    },
}
</script>
