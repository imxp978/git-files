
<body>
  <?php require_once("./components/head.php"); ?>
  <?php require_once("./components/modal.php"); ?>
  <?php require_once("./components/navbar.php"); ?>
  <section id="products">
    <?php
    if (isset($_GET['classid'])) {
      $SQLstring = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid='%d' ORDER BY product.p_id", $_GET['classid']);
    } else {
      $SQLstring = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id");
    }
    $product = $link->query($SQLstring);
    $i = 0;
    ?>
    <div class="container px-5 text-center py-5" >
      <h3 class="my-5 movable slideIn">CATEGORIES</h3>
      <div class="row my-3">
        <?php while ($data = $product->fetch()) { ?>
          <div class="card col-sm-12 col-md-6 col-lg-3 border-0 gx-5 gy-5 movable slideIn">
            <div class="card-image">
              <div class="card-modal" style="z-index: 1">
                <p class="product-link">
                  <a href="./product.php?productid=<?php echo $data['p_id']?>"> <?php echo $data['p_name']; ?> </a>
                </p>
              </div>
              <div class="product-image">
                <a href="./product.php?productid=<?php echo $data['p_id']?>"><img src="./images/product_images/<?php echo $data['img_file']; ?>" class="card-img-top" alt="..." /></a>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
            </div>
          </div>
        <?php } ?>
      </div>
      <hr />
    </div>
  </section>
  <?php require_once("./components/footer.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>