<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import Navbar from './components/Navbar.vue'
import Content from './components/Content.vue'
import Scontent from './components/Scontent.vue'
import Footer from './components/Footer.vue'
import Modal from './components/Modal.vue'
import Carousel from './components/Carousel.vue'
</script>

<template>
  <div id="wrap">
    <Navbar/>
    <Carousel/>
    <Content/>
    <Scontent/>
    <Footer/>
    <Modal/>
  </div>


</template>

<style scoped>

</style>
