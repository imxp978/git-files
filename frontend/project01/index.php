<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section id="navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light fixed-top mx-auto">
        <div class="container d-flex justify-content-between">
          <a class="navbar-brand" href="#">THIS IS GOOD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
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


            </ul>
            <div class="d-flex justify-content-end">
            <ul class="navbar-nav me-auto mb-2">
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                <!-- <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
              </li>
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
              </li>
              <li>
                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
            </div>
          </div>
        </div>
      </nav>
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
            <img src="images/carousel00.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/carousel01.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/carousel02.webp" class="d-block w-100" alt="...">
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
      </div>

      <hr>

      <div class="container px-5 text-center" py-5>
        <h3 class="my-5">Category</h3>
        <div class="row gx-5 gy-5 my-5">
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>Plates</p>
              </div>
              <a href="#"><img src="images/product_images/001.webp" class="card-img-top" alt="..."></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title2</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>Bowl</p>
              </div>
              <a href="#"><img src="images/product_images/002.jpg" class="card-img" alt="..."></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title1</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>Dinnerware</p>
              </div>
              <img src="images/product_images/003.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title3</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>

          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <img src="images/product_images/004.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title4</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <img src="images/product_images/001.webp" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title5</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <img src="images/product_images/001.webp" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title6</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>

          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <img src="images/product_images/001.webp" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title7</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <a href="#"><img src="images/product_images/001.webp" class="card-img-top" alt="..."></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title8</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index:1">
                <p>cat.1</p>
              </div>
              <a href="#"><img src="images/product_images/001.webp" class="card-img-top" alt="..."></a>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title9</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </section>
  <section id="scontent">
    <div class="container text-center mx-auto px-5 py-5">
      <h3 class="mx-auto">Review</h3>
        <div class="row gy-10">
          <div class="card col-6 gx-5 gy-5 border-0">
            <div class="row g-3">
              <div class="col-md-4">
                <img src="images/user_images/person_2.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card col-6 gx-5 gy-5 border-0">
            <div class="row g-3">
              <div class="col-md-4">
                <img src="images/user_images/person_3.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row gy-10">
          <div class="card col-6 gx-5 gy-5 border-0">
            <div class="row g-3">
              <div class="col-md-4">
                <img src="images/user_images/person_4.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card col-6 gx-5 gy-5 border-0">
            <div class="row g-3">
              <div class="col-md-4">
                <img src="images/user_images/person_1.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
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
        <div class="col col-sm-6 col-12">
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
          <h5>Fellow Us</h5>
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </section>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<a href="https://canadianloghomes.com/product-category/decor/rustic-dinnerware/">check</a>
<a href="https://www.connox.com/broste-copenhagen/broste-copenhagen-nordic-sand-tableware.html">check</a>
<a href="https://www.bonappetit.com/story/dinner-party-ceramics">bon appetit</a>
<a href="https://www.eastfork.com/">eastfork</a>
</body>

</html>
