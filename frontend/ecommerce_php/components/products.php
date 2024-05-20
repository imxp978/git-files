<section id="products">
  <?php
    if (isset($_GET['classid'])) {
      $SQLstring = sprintf("SELECT * FROM product,product_img, pyclass WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid='%d' AND product.classid=pyclass.classid ORDER BY product.p_id", $_GET['classid']);
      $SQLstring_title = sprintf("SELECT cname FROM pyclass WHERE classid=%s",$_GET['classid'] );
      $title_query = $link->query($SQLstring_title);
      $title = strtoupper($title_query->fetch()['cname']);
    } elseif (isset($_GET['search'])) {
      //使用關鍵字查詢  
      // LIKE 相似查詢 欄位名稱 LIKE '%' . keyword .'%'， '%'為任意字元
      $SQLstring = sprintf("SELECT * FROM product, product_img, pyclass 
          WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND (product.p_name 
          LIKE '%s'  OR product.p_price LIKE '%s')
          ORDER BY product.p_id DESC", '%' . $_GET['search'] . '%', '%' . $_GET['search'] . '%');
    } else {
      $SQLstring = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id");
    }
    $product = $link->query($SQLstring);
    if ($product->rowCount() > 0) {
      $i = 0;
  ?>
    <div class="container px-5 text-center py-5">
      <h3 class="my-5 movable slideIn"><?php echo $title; ?></h3>
      <div class="row my-3">
        <?php while ($data = $product->fetch()) { ?>
          <div class="card col-sm-12 col-md-6 col-lg-3 border-0 gx-5 gy-5 movable slideIn">
            <div class="card-image">
              <div class="card-modal" style="z-index: 1">
                <p class="product-link">
                  <a href="./product.php?productid=<?php echo $data['p_id'] ?>"> <?php echo $data['p_name']; ?> </a>
                </p>
              </div>
              <div class="product-image">
                <a href="./product.php?productid=<?php echo $data['p_id'] ?>"><img
                    src="./images/product_images/<?php echo $data['img_file']; ?>" class="card-img-top" alt="..." /></a>
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
  <?php } else { ?>
    <div class="container px-5 text-center py-5">
      <h3 class="my-5 movable slideIn">404</h3>
      <p>Page Not Found / No Search Result</p>
    </div>
  <?php } ?>
</section>