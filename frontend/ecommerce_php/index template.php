<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>We Live, We Eat, We Grow</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="./main.css" />
</head>

<body>
  <section id="modal">
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Log In</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              Account:
              <input class="form-control m-1" type="text" value="test@example.com" />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
              Sign Up
            </button>
            <button type="button" class="btn btn-dark">Log In</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              Username:
              <input class="form-control m-1" type="text" value="user01" />
              Email:
              <input class="form-control m-1" type="email" value="test@example.com" />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
              Re-enter Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-dark" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-lg mt-5" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-end">
              <div class="col-6 text-center">item</div>
              <div class="col-2 text-end">price</div>
              <div class="col-2 text-end">quantity</div>
              <div class="col-2 text-end">subtotal</div>
            </div>
            <hr />
            <Transition>
              <div v-show="cartStore.checkCart()" class="text-end">
                Cart is empty
              </div>
            </Transition>
            <ul>
              <li v-for="item in cart" class="row d-flex justify-content-end align-items-baseline">
                <div class="col-6 text-start">
                  <img :src="`../images/product_images/${item.image}`" width="50px" />
                  product.title
                </div>
                <div class="col-2 text-end">$: product.price</div>
                <div class="col-2 text-end">
                  <input type="number" class="form-control" min="0" v-model="item.quantity" @change="cartStore.checkQuantity(item)" />
                </div>
                <div class="col-2 text-end">
                  $: product.price * product.quantity
                </div>
              </li>
            </ul>
            <hr />
            <li class="col-12 text-end d-flex justify-content-end">
              <div>Total $: sum</div>
            </li>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-dark">Checkout</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end">
        <div class="container">
          <a class="navbar-brand" href="#">
            <h3>We Live, <br />We Eat, <br />We Grow</h3>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-light" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./products.php">Products</a>
              </li>
              <?php
              //讀取後台購物車內產品數量
              $SQLstring = "SELECT * FROM cart 
                    WHERE orderid is NULL 
                    AND ip = '" . $_SERVER['REMOTE_ADDR'] . "'";
              $cart_rs = $link->query($SQLstring);

              //列出產品類別第一層
              $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
              $pyclass01 = $link->query($SQLstring);
              ?>
              <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $pyclass01_Rows['cname']; ?>
                  </a>
                  <?php
                  //SECOND LEVEL 第二層產品資料
                  $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink = %d ORDER BY sort", $pyclass01_Rows['classid']);
                  $pyclass02 = $link->query($SQLstring);
                  ?>
                  <ul class="dropdown-menu">
                    <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                      <li><a class="dropdown-item" href="products.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                          <?php echo $pyclass02_Rows['cname']; ?></a>
                      </li>
                    <?php } ?>
                  </ul>
                </li>
              <?php } ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  About Us
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Company</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Contact Us</a>
                  </li>
                  <li></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Links
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">Terms and Conditions</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Privacy</a></li>
                  <li><a class="dropdown-item" href="#">FAQ</a></li>
                </ul>
              </li>
            </ul>
            <div class="d-flex justify-content-lg-end justify-content-end text-end">
              <ul class="navbar-nav mb-2">
                <!-- <div id="search" class="input-group mb-3 d-flex justify-content-end align-item-center" >
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                  </div> -->
                <li class="d-flex justify-content-end">
                  <form id="search" class="d-flex justify-content-end text-end" :class="{ active: search }" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-dark" type="submit">Search</button>
                  </form>
                  <a class="nav-link" href="#" @click.prevent="searchShow"><i class="fa-solid fa-magnifying-glass fa-4"></i></a>
                </li>
                <li class="d-flex justify-content-end">
                  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login"><i class="fa-solid fa-user fa-4"></i></a>
                </li>
                <li class="d-flex justify-content-end">
                  <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cart"><span><i class="fa-solid fa-cart-shopping fa-4"></i>
                      <Transition>
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger" v-if="cartStore.countItem()>0">
                          5
                        </span>
                      </Transition>
                    </span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <hr />
    </div>
  </section>
  <section id="carousel">
    <div class="container">

      <?php
      $SQLstring = "SELECT * FROM carousel WHERE caro_online=1 ORDER BY caro_sort";
      $carousel = $link->query($SQLstring);
      $i = 0;
      function activeShow($num, $chkPoint)
      {
        return (($num == $chkPoint) ? 'active' : '');
      };
      ?>

      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <?php for ($i = 1; $i <= $carousel->rowCount(); $i++) { ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
          <?php } ?>
        </div>
        <div class="carousel-inner">
          <?php $i = 0;
          while ($data = $carousel->fetch()) { ?>
            <div class="carousel-item <?php echo activeShow($i, 0); ?>">
              <img src="images/carousel_images/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="<?php echo $data['caro_title']; ?>">
              <div class="carousel-caption d-none d-md-block">
                <h5><?php echo $data['caro_title']; ?></h5>
                <p><?php echo $data['caro_content']; ?></p>
              </div>
            </div>
          <?php $i++;
          } ?>
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
    </div>
  </section>
  <section id="categories">
    <?php
    $SQLstring = "SELECT * FROM pyclass WHERE level=2";
    $category = $link->query($SQLstring);
    $i = 0;
    ?>
    <div class="container px-5 text-center" py-5>
      <h3 class="my-5 movable slideIn">CATEGORIES</h3>
      <div class="row my-3">
        <?php while ($data = $category->fetch()) { ?>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5">
            <div class="card-image">
              <div class="card-modal" style="z-index: 1">
                <p>
                  <a href="#"> <?php echo $data['cname']; ?> </a>
                </p>
              </div>
              <div class="category-image">
                <a href="#"><img src="./images/category_images/<?php echo $data['image']; ?>" class="card-img-top" alt="..." /></a>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['cname']; ?></h5>
            </div>
          </div>
        <?php } ?>
      </div>
      <hr />
    </div>
  </section>
  <section id="reviews" style="width: 100%">
    <?php $SQLstring = "SELECT * FROM review";
    $review = $link->query($SQLstring); ?>
    <div class="container text-center mx-auto px-5 py-5">
      <h3 class="my-5 movable slideIn">REVIEWS</h3>
      <div class="row gy-10 gx-5">
        <?php $i = 0;
        while ($data = $review->fetch()) { ?>
          <div class="card col-6 border-0 border-end border-bottom border-3">
            <div class="row g-5">
              <div class="review col-md-4 movable slideIn slideInLeft">
                <div class="review-image">
                  <img src="./images/user_images/<?php echo $data['image']; ?>" class="img-fluid rounded-start" alt="..." />
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body text-start">
                  <h5 class="card-title"><?php echo $data['user'] ?></h5>
                  <?php for ($j = 0; $j < $data['rate']; $j++) { ?>
                    <i class="fa-solid fa-star"></i>
                  <?php } ?>
                  <p class="card-text"><?php echo $data['content']; ?></p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php $i++;
        } ?>
      </div>
      <hr />
    </div>
  </section>
  <section id="footer">
    <div class="container mx-auto pb-3" style="width: 100%">
      <div class="row">
        <div class="col-12">
          <i class="fa-brands fa-cc-visa fa-2x fa-fw"></i>
          <i class="fa-brands fa-cc-mastercard fa-2x fa-fw"></i>
          <i class="fa-brands fa-cc-paypal fa-2x fa-fw"></i>
        </div>
        <div class="col col-sm-6 col-12 text-end text-sm-start">
          <h5>About Us</h5>
          Company <br />
          email: thisisanemail@email.com <br />
          tel: +886 987654321 <br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Member</h5>
          <a href="#" data-bs-toggle="modal" data-bs-target="#login">My Account</a><br />
          <a href="#" data-bs-toggle="modal" data-bs-target="#cart">My Cart</a><br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Terms & Conditions</h5>
          <a href="#">Return & Policy</a> <br />
          <a href="#">Privacy</a><br />
          <a href="#">FAQ</a><br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Follow Us</h5>
          <a href="#"><i class="fa-brands fa-facebook fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-instagram fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-twitter fs-3 fa-fw"> </i></a>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>