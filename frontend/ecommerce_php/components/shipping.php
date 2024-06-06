<section id="checkout">

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>

    <?php // require_once('connections/conn_db.php'); 
    ?>

    <div class="container ">
        <h3 class="mt-5 text-center">Shipping</h3>
        <div class="row d-flex justify-content-center align-items-end">
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                <div class="col-5">
                    <?php
                    $SQLstring_add = sprintf("SELECT * FROM addbook WHERE user_id = %d ORDER BY addressid DESC", $_SESSION['id']);
                    $adds = $link->query($SQLstring_add);
                    if ($adds->rowCount() > 0) {
                    ?>
                    <div>
                        <h5>Choose Address</h5>

                        <?php while ($data2 = $adds->fetch()) { ?>
                            <div class="row d-flex align-items-center p-1">
                                <div class="col-1">
                                    <input type="radio" name="gridRadios" id="gridRadios[]" value="<?php echo $data2['addressid'] ?>" <?php echo ($data2['setdefault']) ? 'checked' : ''; ?>>
                                </div>
                                <div class="col-2"><?php echo $data2['cname']; ?></div>
                                <div class="col-3"><?php echo $data2['phone'] ?></div>
                                <div class="col-6"><?php echo $data2['address'] ?></div>
                            </div>
                            <hr>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div>
                        <h5>Add New Address</h5>
                        Name: <br>
                        <input class="form-control" type="text" id="name"><br>
                        Address: <br>
                        <input class="form-control" type="text" id="address"><br>
                        Phone Number: <br>
                        <input class="form-control" type="text" id="phone"><br>
                        <div class="my-3 text-start">
                            <button id="add_btn" class="btn btn-sm btn-dark">Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <div class="row text-end d-flex align-items-center">
                        <div class="col-2">#</div>
                        <div class="col-5">item</div>
                        <div class="col-2">price</div>
                        <div class="col-1">pcs</div>
                        <div class="col-2">sub</div>
                        <hr>
                        <?php
                        $SQLstring = sprintf("SELECT * FROM cart, product, product_img WHERE orderid IS NULL AND ip='%s' AND cart.p_id = product.p_id AND product_img.p_id = product.p_id AND sort=1", $_SERVER['REMOTE_ADDR']);
                        $items = $link->query($SQLstring);
                        $total = 0;
                        while ($data = $items->fetch()) { ?>
                            <div class="col-2"><img src="images/product_images/<?php echo $data['img_file'] ?>" style="width:40px;" alt=""></div>
                            <div class="col-5"><?php echo $data['p_name']; ?></div>
                            <div class="col-2"><?php echo '$: ' . $data['p_price']; ?></div>
                            <div class="col-1"><?php echo $data['qty']; ?></div>
                            <div class="col-2"><?php echo '$: ' . $data['p_price'] * $data['qty']; ?></div>
                            <hr>


                        <?php $total += $data['p_price'] * $data['qty'];
                        } ?>
                        <div class="col-10">Shipping: </div>
                        <div class="col-2">$ 50</div>

                        <div class="col-10 my-3">Total: </div>
                        <div class="col-2"><?php echo $total + 50; ?></div>

                    </div>
                </div>
                <hr>
                <?php if ($adds->rowCount() > 0) { ?>
                    <div class="col-10 my-5 text-center">
                        <button class="btn btn-dark">Check Out</button>
                    </div>
                <?php } else { ?>
                    <div class="col-10 my-5 text-center">
                        Add Shipping Address to Checkout
                    </div>
                <?php } ?>



            <?php } else { ?>
                <div class="text-center">
                    <a href="member.php"><button class="btn btn-sm btn-dark">Please Login</button></a>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>

    <script>
        const add_btn = document.querySelector('#add_btn');
        add_btn.addEventListener('click', () => {
            let name = document.querySelector('#name');
            let address = document.querySelector('#address');
            let phone = document.querySelector('#phone');
            if ( name.value && address.value && phone.value) {
                fetch('addadd.php', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name.value,
                        address: address.value,
                        phone: phone.value
                    })
                })
                .then(response=>response.json())
                .then(data=> { 
                    if (data.success) {
                        console.log(data.message);
                        notice(data.message);
                        setTimeout (
                            ()=> {
                                window.location.reload();
                            },1000
                        )
                    }
                })
                .catch(error=>{
                    console.log(data.message);
                    notice(data.message);
                })
            } else {
                notice('Insert Name, Address, and Phone');
            }
        })

    </script>
</section>