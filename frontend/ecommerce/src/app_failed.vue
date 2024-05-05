
<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>



<template>
<div id="app">
  <section id="navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end">
        <div class="container">
          <a class="navbar-brand" href="#"><h3>We Live, <br>We Eat, <br>We Grow</h3></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-light" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories 2
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories 3
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <div class="d-flex justify-content-lg-end justify-content-start">
            <ul class="navbar-nav  mb-2">
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass fa-4"></i></a>
                <!-- <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
              </li>
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-user fa-4"></i></a>
              </li>
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping fa-4"></i></a>
              </li>
            </ul>
            </div>
          </div>
        </div>
      </nav>
      <hr>
    </div>
   </section>

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
            <img src="@/assets/images/carousel00.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="@/assets/images/carousel01.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="@/assets/images/carousel02.webp" class="d-block w-100" alt="...">
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
            <div class="card">
              <h5 class="card-title">{{item.title}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </section>

  <section id="scontent">
    <div class="container text-center mx-auto px-5 py-5 ">
      <h3 class="mx-auto">Review</h3>
        <div class="row gy-10 gx-5">
          <div class="card col-6 border-0 border-end border-bottom border-3" v-for="item in reviewList">
            <div class="row g-5" >
              <div class="review col-md-4">
                <div class="review-image">
                  <img :src=item.image class="img-fluid rounded-start" alt="...">
                </div>
              </div>
              <div class="col-md-8">
                <div class="cartext-start">
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

  <section id="footer">
    <div class="container mx-auto pb-3 " style="width:100%">
      <div class="row">
        <div class="col col-sm-6 col-12 text-end text-sm-start">
          <h5>About Us</h5>
          Company <br>
          email: thisisanemail.email.com <br>
          tel: +886 987654321 <br>
        </div>
        <div class="col col-12 col-sm-2 text-end ">
          <h5>Member</h5>
          <a href="#">My Account</a><br>
          <a href="#">My Cart</a><br>
        </div>
        <div class="col col-12 col-sm-2 text-end ">
          <h5>Term & Condition</h5>
          <a href="#">Return & Policy</a> <br>
          <a href="#">Privacy</a><br>
          <a href="#">FAQ</a><br>
        </div>
        <div class="col col-12 col-sm-2 text-end ">
          <h5>Follow Us</h5>
          <a href="#"><i class="fa-brands fa-facebook fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-instagram fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-twitter fs-3 fa-fw"> </i></a>
        </div>
      </div>
    </div>
  </section>
</div>


</template>


<style>
*{
  bo/rder: 1px solid black;
}{
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

/* .card .car{
  width: 100%;
  visibility:hidden;
  transition: 0.5s;
  position: absolute;
  z-index: 2;
}

.card .carhover {
  visibility: visible;
  transition: 0.3s;
  z-index: 2;
} */

</style>