<section id="product">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">

        <div id="cartnotice" class="notice col-12 position-fixed d-flex justify-content-center">
          <p class="mx-auto my-auto" style="color:white">
            Added to cart <i class="fa-regular fa-circle-check"></i>
          </p>
        </div>

        <div id="notifynotice" class="notice col-12 position-fixed d-flex justify-content-center">
          <p class="mx-auto my-auto" style="color:white">
            Success <i class=" fa-regular fa-circle-check"></i>
          </p>
        </div>

      </div>
      <?php
      if (isset($_GET['productid'])) {
        $SQLstringImg = sprintf("SELECT * FROM product_img 
                WHERE p_id=%d
                ORDER BY sort DESC", $_GET['productid']);
        $img_rs = $link->query($SQLstringImg);


        $SQLstringData = sprintf("SELECT * FROM product 
                WHERE p_open=1 AND p_id=%s", $_GET['productid']);
        $product_data = $link->query($SQLstringData);
        $data = $product_data->fetch();
      } ?>
      
      <div class="col-12 col-lg-6">
        <?php while ($imgList = $img_rs->fetch()) { ?>
          <div class="product_image">
            <img src="./images/product_images/<?php echo $imgList['img_file']; ?>" class="" alt="..." />
          </div>
        <?php } ?>
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
          <div class="row d-flex justify-content-center m-3">
            <select name="quantity" id="quantify" class="form-select m-3">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <?php if ($data['p_qty'] > 0) { ?>
            <button onclick="addcart(<?php echo $data['p_id']; ?>)" class="btn btn-dark m-3">
              ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
            </button>
          <?php } else { ?>
            <button onclick="notifyMe()" class="btn btn-danger m-3">
              NOTIFY ME <i class="fa-solid fa-bell"></i>
            </button>
          <?php } ?>
          <hr />

          <div class="col-12 col-lg-12">
            <div class="container">
              <h5>SPEC</h5>
              <p>
                <?php echo $data['p_spec'] ?>
              </p>
            </div>
          </div>
          <div class="col-12 col-lg-12">
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
</section>