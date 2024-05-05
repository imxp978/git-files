<template>
  <section id="content">
      <div class="container">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/images/carousel00.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../assets/images/carousel01.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../assets/images/carousel02.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <hr>
      </div>

      <div class="container px-5 text-center" py-5>
        <h3 class="my-5">Category</h3>
        <div class="row gx-5 gy-5 my-5 " >
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5" v-for="item in categoryList">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>{{item.title}}</p>
              </div>
              <a href="#"><img :src="item.image" class="card-img-top" alt="..."></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{item.title}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </section>
</template>

<script setup>
import {ref} from "vue";

const categoryList = ref( [
        {id:1, title:"plate", image:"/images/product_images/001.webp"},
        {id:2, title:"bowl", image:"/images/product_images/002.jpg"},
        {id:3, title:"cooker", image:"/images/product_images/003.jpg"},
        {id:4, title:"pot", image:"/images/product_images/001.webp"},
        {id:5, title:"good one too", image:"/images/product_images/004.jpg"},
        {id:6, title:"good one 333", image:"/images/product_images/002.jpg"},
        {id:7, title:"good one 333", image:"/images/product_images/003.jpg"},
        {id:8, title:"good one 111", image:"/images/product_images/001.webp"},
        {id:9, title:"good one too", image:"/images/product_images/002.jpg"},
      ]);
</script>

<style>
*{
  bo/rder: 1px solid black;
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