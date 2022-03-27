<template>
    <div>
        <div class="col">
        <div class="card" v-for="post of posts" :key="post.id" :post="post">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text" v-html="post.content"></p>

                <em>Autore: {{ post.user.name }};</em
                ><br />
                </div>
                <div class="card-footer">
                    <router-link :to="{name:'posts.show', params:{post:post.id}}">Dettagli</router-link>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

import axios from "axios";

export default {
    components: {},
        data() {
            return {
            posts: [],
            };
        },
        methods: {
        async fetchPosts() {
      
            try{
                const resp = await axios.get("http://127.0.0.1:8000/api/posts");
                this.posts = resp.data.data;
                
            }catch(er){
                console.log(er);
            }  
        }
    
    },
    mounted() {
        this.fetchPosts();
  },
};


</script>

<style>

</style>