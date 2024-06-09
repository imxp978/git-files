<section id="product">
  <div class="container d-flex ">
    <div class="d-flex flex-column justify-content-center">
      <?php
      if (isset($_GET['productid'])) {
        $SQLstringImg = sprintf("SELECT * FROM product_img 
                WHERE p_id=%d ORDER BY sort DESC", $_GET['productid']);
        $img_rs = $link->query($SQLstringImg);
        // $imgList = $img_rs->fetch();
        // $count = $img_rs->rowCount();
        //echo $count;

        $SQLstringData = sprintf("SELECT * FROM product 
                WHERE p_open=1 AND p_id=%s", $_GET['productid']);
        $product_data = $link->query($SQLstringData);
        $data = $product_data->fetch();
      }
      ?>
      <div class="row">
        <div class="col-12 col-lg-6">
          <div style="--swiper-navigation-color: black; --swiper-pagination-color: black" class="swiper productSwiper">
            <div class="swiper-wrapper">
              <?php $i = 0;
              while ($imgList = $img_rs->fetch()) { ?>
                <div class="swiper-slide">
                  <img src="./images/product_images/<?php echo $imgList['img_file']; ?>" loading="lazy" />
                  <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </div>
              <?php $i++;
              } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container d-flex flex-column">
            <h4 class="my-5"><?php echo $data['p_name'] ?></h4>
            <p class="fs-4 text-end">
              <i class="fa-solid fa-dollar-sign"></i><?php echo $data['p_price'] ?>
            </p>
            <?php if ($data['p_qty'] > 4) { ?>
              <p class="text-end">In Stock</p>
            <?php } else if ($data['p_qty'] > 0) { ?>
              <p class="text-end" style="color: orange">Low Stock</p>
            <?php } else { ?>
              <p class="text-end" style="color: red">Out of Stock</p>
            <?php } ?>
            <p>
              <?php echo $data['p_intro'] ?>
            </p>

            <?php if ($data['p_qty'] > 0) { ?>
              <div class="row d-flex justify-content-center my-5">
                <button class="col-1 btn btn-sm btn-light" id="minus_btn">-</button>
                <div class="col-10">
                  <input class="col-10 form-control quantity text-center" type="number" value="1" id="quantity" min="1" readonly></input>
                </div>
                <button class="col-1 btn btn-sm btn-light" id="plus_btn">+</button>
              </div>
            <?php } ?>

            <?php if ($data['p_qty'] > 0) { ?>
              <button class="btn btn-dark my-3" id="add_btn">
                ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
              </button>
              <!-- <button onclick="addcart(<?php echo $data['p_id']; ?>)" class="btn btn-dark my-3" id="add_btn">
                ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
              </button> -->
            <?php } else { ?>
              <button onclick="notice('Success')" class="btn btn-danger my-3">
                NOTIFY ME <i class="fa-solid fa-bell"></i>
              </button>
            <?php } ?>
          </div>
          <hr />
        </div>
        <div class="col-12 col-lg-6 mb-5">
          <div class="container">
            <h5>SPEC</h5>
            <p>
              <?php echo $data['p_spec'] ?>
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 mb-5">
          <div class="container">
            <h5>DESCRIPTION</h5>
            <p>
              <?php echo $data['p_content'] ?>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <hr />
  <script src="scripts/product.js"></script>
</section>