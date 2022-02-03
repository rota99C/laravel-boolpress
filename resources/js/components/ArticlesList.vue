<template>
  <div class="container">
    <div class="singolo" v-for="post in posts" v-bind:key="post">
      <div class="card">
        <div class="card-body">
          <h3>{{ post.title }}</h3>
          <img :src="'storage/' + post.image" alt="" />
          <p>{{ post.subtitle }}</p>
        </div>
      </div>
    </div>
    <div></div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      posts: "",
      meta: "",
      links: "",
    };
  },
  mounted() {
    Axios.get("api/posts").then((response) => {
      console.log(response);
      this.posts = response.data.data;
      this.meta = response.data.meta;
      this.links = response.data.links;
    });
  },
};
</script>

<style>
</style>