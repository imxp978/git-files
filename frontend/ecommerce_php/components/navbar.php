<section id="navbar">
<div class="container">
    <nav
      class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end">
      <div class="container">
        <a class="navbar-brand" href="./index.php">
          <h3>We Live, <br />We Eat, <br />We Grow</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-light" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./">Home</a>
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-item" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
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
              <li class="d-flex justify-content-end">
                <div id="search">
                  <form name="search-form" method="get" action="./products.php"
                    class="d-flex justify-content-end text-end" role="search">
                    <input value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" name="search"
                      class="form-control me-2" type="search" required placeholder="Search products" aria-label="Search"
                      style="min-width:100px" />
                    <button class="btn btn-sm btn-dark" type="submit">Search</button>
                  </form>
                  </div>
                <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass fa-4"
                    onclick="searchShow()"></i></a>
              </li>
              <li class="d-flex justify-content-end">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login"><i
                    class="fa-solid fa-user fa-4"></i></a>
              </li>
              <li class="d-flex justify-content-end">
                <!-- <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cart"><span><i
                      class="fa-solid fa-cart-shopping fa-4"></i> -->
                      <a class="nav-link" href="./cart.php" ><span><i
                      class="fa-solid fa-cart-shopping fa-4"></i>
                      <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                        5
                      </span>
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