<template>
  <div>
    <TheNavbar></TheNavbar>
    <div>
        <button class="btn btn-primary" @click="fetchPosts">Lista Post</button>
    </div>

     <div class="col">
      <div class="card" v-for="post of posts" :key="post.id" :post="post">
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>
          <p class="card-text" v-html="post.content"></p>

          <em>Autore: {{ post.user.name }};</em
          ><br />
          <!-- <strong v-if="post.category">{{ post.category.code }}</strong> -->
        </div>
        <div class="card-footer">
          <a href="#">Dettagli</a>
        </div>
     </div>
    </div>

  </div>
</template>

<script>
import ExampleComponentVue from "../components/ExampleComponent.vue";
import TheNavbar from "../components/TheNavbar.vue";
import axios from "axios";

export default {
  components: { ExampleComponentVue, TheNavbar },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    fetchPosts() {
      
      axios.get("http://127.0.0.1:8000/api/posts").then((resp) => {
        console.log(resp.data)
        this.posts = resp.data.data;
      });
      
    },
  }
};
</script>

<style></style>