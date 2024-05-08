<script setup>
import { RouterLink, RouterView } from "vue-router";
import Navbar from "./components/Navbar.vue";

import Modal from "./components/Modal.vue";
import Footer from "./components/Footer.vue";
</script>

<template>
  <div id="wrap">
    <Navbar />

    <Modal />
    <RouterView />
    <Footer />
  </div>
</template>

<style scoped>
</style>
