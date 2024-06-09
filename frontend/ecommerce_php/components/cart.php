<section id="cart">
    <?php
    // 建立購物車資料查詢
    $SQLstring = sprintf("SELECT * FROM cart, product, product_img 
                        WHERE ip='%s' AND orderid IS NULL AND cart.p_id = product_img.p_id 
                        AND cart.p_id=product.p_id AND product_img.sort=1 
                        ORDER BY cartid DESC", $_SERVER['REMOTE_ADDR']);

    $cart_rs = $link->query($SQLstring);
    $ptotal = 0; //設定累加的變數 初始=0;
    ?>
    <div class="container text-center">
        <h3 class="mt-5">CART</h3>
        <div class="mb-5 row" id="cart">
            <div class="mx-auto my-5 col-lg-8">
                <div class="cart-body">
                    <div class="row d-flex justify-content-end">
                        <div class="col-1 text-start"></div>
                        <div class="col-5 text-start">item</div>
                        <div class="col-2 text-end">price</div>
                        <div class="col-2 text-end">quantity</div>
                        <div class="col-2 text-end">subtotal</div>
                    </div>
                    <hr />

                        <ul>
                            <?php if ($cart_rs->rowCount() != 0) {
                                while ($cart_data = $cart_rs->fetch()) {
                                    $subtotal = $cart_data['p_price'] * $cart_data['qty'];
                                    $ptotal += $subtotal;
                            ?>
                                    <li class="row d-flex justify-content-end align-items-baseline">
                                        <div class="col-1 text-start"><button class="btn btn-sm btn-light" type="button" id="btn[]" name="btn[]" onclick="btn_confirmLink('Remove This Item?','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>');">x</button></div>
                                        <div class="col-5 text-start">
                                            <img src="./images/product_images/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" width="50px">
                                            <?php echo $cart_data['p_name']; ?>
                                        </div>
                                        <div class="col-2 text-end">$: <?php echo $cart_data['p_price']; ?></div>
                                        <div class="col-2 text-end">
                                            <input type="number" class="form-control quantity" id="quantity2" name="qty[]" value="<?php echo $cart_data['qty']; ?>" min="1" max="49" cartid="<?php echo $cart_data['cartid']; ?>" style="min-width:60px" required>
                                        </div>
                                        <div class="col-2 text-end">$: <?php echo $subtotal; ?></div>
                                    </li>
                                <?php }
                            } else { ?>
                                <li class="text-end">
                                    <p>Cart is empty</p>
                                    <a href="./products.php" class="btn btn-dark"> Go Shop </a>

                                </li>
                            <?php } ?>
                        </ul>
                        <?php if ($cart_rs->rowCount() != 0) { ?>
                            <hr />
                            <li class="col-12 text-end d-flex justify-content-end">
                                <div>Total $: <?php echo $ptotal; ?></div>
                            </li>
                    </div>
                    <div class="cart-footer d-flex justify-content-end">
                        <a href="shipping.php"><button type="button" class="btn btn-dark mt-3">Shipping</button></a>
                    </div>
                <?php } ?>
                </div>
                <hr>
            </div>
        </div>
</section>