<script setup>
import { RouterLink, RouterView } from "vue-router";
import Navbar from "./components/Navbar.vue";
import Modal from "./components/Modal.vue";
import Footer from "./components/Footer.vue";



// import {useCategoryStore} from "@/stores/CategoryStore";

// const categoryStore = useCategoryStore();

</script>

<template>
  <Navbar />
  <Modal />
  <RouterView />
  <Footer />
</template>

