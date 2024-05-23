<?php
$maxRows_rs = 12;
$pageNum_rs = 0;  //起始頁

if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}

$startRows_rs = $pageNum_rs * $maxRows_rs;


if (isset($_GET['search_name'])) {

  $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND product.p_name LIKE '%s' ORDER BY product.p_id DESC", '%' . $_GET['search_name'] . '%');
} elseif (isset($_GET['level']) && $_GET['level'] == 1) {

  // 使用產品類別查詢
  $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND pyclass.uplink='%d' ORDER BY product.p_id DESC", $_GET['classid']);
} elseif (isset($_GET['classid'])) {

  $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid='%d' ORDER BY product.p_id DESC", $_GET['classid']);
} else {

  // 列出產品資料查詢
  $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC");
}

$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRows_rs, $maxRows_rs);
$pList01 = $link->query($query);
$i = 1

?>

<?php if ($pList01->rowCount() != 0) { ?>

  <?php
  while ($pList01_Rows = $pList01->fetch()) { ?>
    <?php if ($i % 4 == 1) { ?>

      <div class="row text-center">
      <?php } ?>

      <div class="card col-md-3">
        <a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>">
          <img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name'] ?>" title="<?php echo $pList01_Rows['p_name'] ?>">
        </a>
        <div class="card-body">
          <h5 class="card-title"><?php echo $pList01_Rows['p_name'] ?></h5>
          <p class="card-text"><?php echo $pList01_Rows['p_intro'], 0, 30, "utf-8"; ?></p>
          <p class="card-text"><?php echo $pList01_Rows['p_price'] ?></p>
          <a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>" class="btn btn-primary">更多資訊</a>
          <!-- <a href="#" class="btn btn-success">放購物車</a> -->
          <button type="button" id="button01[]" name="button01[]" class="btn btn-success" onclick="addcart(<?php echo $pList01_Rows['p_id'] ?>)">加入購物車</button>
        </div>
      </div>
      <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
      </div>
    <?php } ?>

  <?php $i++;
  } ?>

  <div class="row mt-2">

    <?php

    if (isset($_GET['totalRows_rs'])) {
      $totalRows_rs = $_GET['totalRows_rs'];
    } else {
      $all_rs = $link->query($queryFirst);
      $totalRows_rs = $all_rs->rowCount();
    }

    $totalRows_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalRows_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");

    ?>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        
        <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>

      </ul>
    </nav>
  </div>

<?php } else { ?>

  <div class="alert alert-danger" role="alert">
    抱歉，沒有相關產品
  </div>

<?php } ?>