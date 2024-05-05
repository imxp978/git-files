<template>
    <section id="scontent" style="width:100%">
    <div class="container text-center mx-auto px-5 py-5 ">
      <h3 class="mx-auto">Review</h3>
        <div class="row gy-10 gx-5">
          <div class="card col-6 border-0 border-end border-bottom border-3" v-for="item in reviewList" v-key="item.id">
            <div class="row g-5" >
              <div class="review col-md-4">
                <div class="review-image">
                  <img :src=item.image class="img-fluid rounded-start" alt="...">
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body text-start">
                  <h5 class="card-title">{{item.title}}</h5><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  <p class="card-text">{{item.content}}</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
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



const reviewList = ref( [
        {id:1, title:"user1", content:"this is good 1", image:"/images/user_images/person_1.jpg",},
        {id:2, title:"user2", content:"this is good 2", image:"/images/user_images/person_2.jpg",},
        {id:3, title:"user3", content:"this is good 3", image:"/images/user_images/person_3.jpg",},
        {id:4, title:"user4", content:"this is good 4", image:"/images/user_images/person_4.jpg",},
      ]);

const productList = ref( [
        {id:1, title:"", content:"", price:"", image:"",}
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
</style>