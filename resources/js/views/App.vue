<template>
  <div>
    <TheNavbar></TheNavbar>
    <router-view></router-view>

  </div>
</template>

<script>

import TheNavbar from "../components/TheNavbar.vue";

export default {
  components: { TheNavbar },
};
</script>

<style></style>