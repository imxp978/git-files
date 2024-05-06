<template>
  <section id="navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end">
        <div class="container mx-auto d-flex justify-content-center">
          <a class="navbar-brand mx-auto" href="#"><h3>We Live, <br>We Eat, <br>We Grow</h3></a>
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
</template>

<script>
export default {

}
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

.navbar .navbar-brand h3 {
  background-color: whitegray;
  co/lor: white;
  padding: 1.3vw;
  border-radius: 50% !important;
  border: 3px solid black !important;
  text-decoration: underline;
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