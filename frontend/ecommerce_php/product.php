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
              <p class="mx-auto my-auto" style="color:white">
                Added to cart <i class="fa-regular fa-circle-check"></i>
              </p>
            </div>

            <div id="notifynotice"
              class="notice col-12 position-fixed d-flex justify-content-center">
              <p class="mx-auto my-auto" style="color:white"">
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
            <?php if ($data['p_qty']>4) { ?>
            <p class="text-end">In Stock</p>
            <?php } else if ($data['p_qty']>0) { ?>
            <p class="text-end" style="color: orange">Low Stock</p>
            <?php } else {?>
            <p class="text-end" style="color: red">Out of Stock</p>
            <p>
              <?php echo $data['p_intro']?>
            </p>
            <?php } ?>
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
            <?php if($data['p_qty'] > 0) { ?><button onclick="addcart(<?php echo $data['p_id']; ?>)" class="btn btn-dark m-3">
              ADD TO CART <i class="fa-solid fa-cart-shopping"></i>
            </button>
            <?php } else { ?>
            <button onclick="notifyMe()" class="btn btn-danger m-3">
              NOTIFY ME <i class="fa-solid fa-bell"></i>
            </button>
            <?php } ?>
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
  function added() {
  const notice = document.querySelector("#cartnotice");
  setTimeout(()=>addClass(notice), 200);
  setTimeout(()=>removeClass(notice), 1000);
}

function notifyMe() {
  const notice = document.querySelector("#notifynotice");
  setTimeout(()=>addClass(notice), 200);
  setTimeout(()=>removeClass(notice), 1000);
}


function addClass(item) {
  item.classList.add('active');
}

function removeClass(item) {
  item.classList.remove('active');
}


function btn_confirmLink(message, url) {
  if (message == "" || url == "") {
      return false;
  }
  if (confirm(message)) {
      window.location = url;
  }
  return false;
}

function addcart(p_id) {
  let qty = $("#quantity").val();
  if (qty <= 0) {
    alert("數量不能為零或負數 懂嗎?");
    return false;
  }
  if (qty == undefined) {
    qty = 1;
  } else if (qty >= 50) {
    alert("數量限制50內");
    return false;
  }
  
    // 利用jquery $.ajax函數呼叫後台的addcart.php
    $.ajax({
    url: "addcart.php",
    type: "get",
    dataType: "json",
    data: { p_id: p_id, qty: qty },
    success: function (data) {
      if (data.c == true) {
        alert(data.m);
      }
    },
    error: function (data) {
      alert("後臺壞了");
    },
  });

  // prompt
  added();
}
</script>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
</body>

</html>