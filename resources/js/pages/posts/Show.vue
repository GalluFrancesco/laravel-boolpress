<template>
  <div>
    <h1>{{ post.title }}</h1>

    <div class="mt-3 text-end d-flex align-items-center">
      <span
        v-for="tag in post.tags"
        :key="tag.id"
        class="badge bg-primary me-2"
        >{{ tag.name }}</span
      >

      <em v-if="post.user" class="ms-auto">{{ post.user.name }}</em>
    </div>

    <div v-html="post.content" class="mt-5 lead"></div> 
  </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            post:[],
        }
    },
    methods:{
        async fetchPost(){
            const resp= await axios.get("/api/posts/" + this.$route.params.post);
            this.post=resp.data;
            
        }
    },
    mounted(){
        this.fetchPost();
    }
}
</script>

<style>

</style>