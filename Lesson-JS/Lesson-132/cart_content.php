<?php
$SQLstring = sprintf("SELECT * FROM cart,product,product_img WHERE ip=%d AND orderid IS NULL AND cart.p_id = product_img.p_id AND cart.p_id = product.p_id AND product_img.sort = 1 ORDER BY cartid DESC", $_SERVER['REMOTE_ADDR']);
$cart_rs = $link->query($SQLstring);
$ptotal = 0
?>


<h3>電商藥粧：購物車</h3>

<?php if ($cart_rs->rowCount() != 0) { ?>
  <form action="checkout.php" method="post" id="cartForm1" name="cartForm1">

    <a href="index.php" id="btn01" name="btn01" class="btn btn-primary">繼續購物</a>
    <button type="button" id="btn02" name="btn02" class="btn btn-info" onclick="window.history.go(-1)">回到上一頁</button>
    <button type="button" id="btn03" name="btn03" class="btn btn-success" onclick="btn_confirmLink('確認清空購物車','shopcart_del.php?mode=2')">清空購物車</button>
    <a href="checkout.php" class="btn btn-warning">前往結帳</a>


    <div class="table-responsive">
      <table class="table table-hover mt-3">

        <thead>
          <tr class="table-warning">
            <td width="10%">產品編號</td>
            <td width="10%">圖片 </td>
            <td width="25%">名稱</td>
            <td width="15%">價格</td>
            <td width="10%">數量</td>
            <td width="15%">小計</td>
            <td width="15%">下次再買</td>
          </tr>
        </thead>

        <tbody>
          <?php while ($cart_data = $cart_rs->fetch()) { ?>
            <tr>
              <td><?php echo $cart_data['p_id'] ?></td>
              <td><img src="product_img/<?php echo $cart_data['img_file'] ?>" alt="<?php echo $cart_data['p_name'] ?>" class="img-fluid">
              </td>
              <td><?php echo $cart_data['p_name'] ?></td>
              <td>
                <h4 class="color_e600a0 pt-1"><?php echo $cart_data['p_price'] ?></h4>
              </td>
              <td style="max-width: 100px;">
                <div class="input-groud">
                  <input type="number" class="form-control" id="qty[]" name="qty[]" value="<?php echo $cart_data['qty'] ?>" min="1" max="49" cartid="<?php echo $cart_data['cartid'] ?>" required style="max-width: 60px;">
                </div>
              </td>
              <td>
                $<?php echo $cart_data['p_price'] * $cart_data['qty'] ?>
              </td>
              <td>
                <button type="button" id="btn[]" name="btn[]" class="btn btn-danger" onclick="btn_confirmLink('確認刪除本資料','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>')">取消</button>
              </td>
            </tr>
          <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
          } ?>

        </tbody>

        <tfoot>
          <tr>
            <td colspan="7">累計:<?php echo $ptotal ?></td>
          </tr>
          <tr>
            <td colspan="7">運費:100</td>
          </tr>
          <tr>
            <td colspan="7" class="color_red">總計:<?php echo $ptotal + 100 ?></td>
          </tr>
        </tfoot>

      </table>

    </div>

  </form>

<?php } else { ?>

  <div class="alert alert-warning" role="alert">
    抱歉!目前購物車沒有商品。
  </div>

<?php } ?>

