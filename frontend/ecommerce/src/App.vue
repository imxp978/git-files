<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import Navbar from './components/Navbar.vue'
import Content from './components/Content.vue'
import Scontent from './components/Scontent.vue'
import Footer from './components/Footer.vue'
</script>

<template>
  <div id="wrap">
    <Navbar/>
    <Content/>
    <Scontent/>
    <Footer/>
  </div>


</template>

<style scoped>
/* header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
} */
*{
  b/order: 1px solid black;
}

body {
  font-family: Helvetica ;
  font-size: 16px;
  margin-top: 200px;
  
}

a {
  text-decoration: none;
  color: black;
}

a:hover {
  text-decoration: underline;
}

h1, h2, h3, h4, h5 {
  font-family: serif;
  margin: 20px auto;
}

.carousel-item {
  height: 100%;
  border-radius: 20px;
  overflow: hidden;
}

#footer h5 {
  text-decoration: underline;
}

.navbar {
  he/ight: 120px;
}

.navbar-brand:hover {
  scale: 1.05;
  transition: 0.2s;
  text-decoration: none;
}


.card {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-modal {
  position: absolute;
}

.card-image {
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-image img:hover {
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
  transition: 0.5s;

}

.card-modal p {
  width:100%;
  height: 100%;
  margin: 0 auto;
  padding: 20px;
  display: none;
  transition: 0.5s;
  color:white;
  border:1px solid white;

}

.card-image:hover .card-modal p {
  transition: 0.5s;
  scale: 1;
  display: block;
}

.review-image {
  border-radius: 5px !important;
  overflow: hidden;
}

.review-image:hover img {
  scale: 1.05;
  transition: 0.3s;
}

/* .card .card-body {
  width: 100%;
  visibility:hidden;
  transition: 0.5s;
  position: absolute;
  z-index: 2;
}

.card .card-body:hover {
  visibility: visible;
  transition: 0.3s;
  z-index: 2;
} */

</style>
