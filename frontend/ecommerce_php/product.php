<body>

<?php require_once("./components/head.php"); ?>
<?php require_once("./components/modal.php"); ?>
<?php require_once("./components/navbar.php"); ?>

<section id="product">
    <div class="container">
      <div class="row">
        <div class="d-flex justify-content-center">

            <div id="cartnotice"
              class="notice col-12 position-fixed d-flex justify-content-center">
              <p class="mx-auto my-auto cartnotice">
                Added to cart <i class="fa-regular fa-circle-check"></i>
              </p>
            </div>

            <div id="notifynotice"
              class="notice col-12 position-fixed d-flex justify-content-center">
              <p class="mx-auto my-auto" v-if="noticeAdded">
                Success <i class="fa-regular fa-circle-check"></i>
              </p>
            </div>

        </div>
        <?php 
            if(isset($_GET['productid'])) {
                $SQLstringImg = sprintf("SELECT * FROM product_img 
                WHERE p_id=%d
                ORDER BY sort", $_GET['productid']);
                $img_rs = $link->query($SQLstringImg);
                $imgList = $img_rs->fetch();

                $SQLstringData = sprintf("SELECT * FROM product 
                WHERE p_open=1 AND p_id=%s", $_GET['productid']);
                $product_data = $link->query($SQLstringData);
                $data = $product_data->fetch();
            }
        ?>
        <div class="col-12 col-lg-6">
          <div class="product_image">
            <img src="./images/product_images/<?php echo $imgList['img_file']; ?>" alt="" />
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container d-flex flex-column">
            <h4 class="my-5"><?php echo $data['p_name']?></h4>
            <p class="fs-4 text-end">
              <i class="fa-solid fa-dollar-sign"></i><?php echo $data['p_price']?>
            </p>
            <p v-if="product.quantity >= 5" class="text-end">In Stock</p>
            <p
              v-else-if="product.quantity > 0"
              class="text-end"
              style="color: orange"
            >
              Low Stock
            </p>
            <p v-else class="text-end" style="color: red">Out of Stock</p>
            <p>
              <?php echo $data['p_intro']?>
            </p>
            <div class="row d-flex justify-content-center m-3">
              <select
                v-if="product.quantity > 0"
                v-model="quantity"
                name="quantity"
                id="quantify"
                class="form-select m-3"
              >
                <option value="1" selected>1</option>
                <option value="2" >2</option>
                <option value="3" >3</option>
                <option value="4" >4</option>
                <option value="5" >5</option>
              </select>
            </div>
            <button onclick="a" class="btn btn-dark m-3">
              ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
            </button>
            <button onclick="notifyMe()" class="btn btn-danger m-3">
              NOTIFY ME <i class="fa-solid fa-bell"></i>
            </button>
          </div>
          <hr />
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>SPEC</h5>
            <p>
                <?php echo $data['p_spec']?>
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="container">
            <h5>DESCRIPTION</h5>
            <p>
                <?php echo $data['p_content']?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </section>

<?php require_once("./components/footer.php"); ?>
<script>
    function a() {
        let notice = document.querySelector('#cartnotice');
        notice.classList.add('active');
        // setTimeout(notice.classList.add('active'), 200);
        // setTimeout(notice.classList.remove('active'), 1000);
    };

    function notifyMe() {
        let notice = document.querySelector('#notifynotice');
        setTimeout(notice.classList.add('active'), 200);
        setTimeout(notice.classList.remove('active'), 1000);
    };

    function
</script>
</body>

</html>