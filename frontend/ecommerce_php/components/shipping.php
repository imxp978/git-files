<section id="shipping">

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>

    <?php // require_once('connections/conn_db.php'); 
    ?>

    <div class="container ">
        <h3 class="mt-5 text-center">SHIPPING</h3>
        <div class="row d-flex justify-content-center">
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { 
                $SQLstring_cart = sprintf("SELECT * FROM cart WHERE ip='%s' AND orderid IS NULL", $_SERVER['REMOTE_ADDR']);
                $cart = $link->query($SQLstring_cart);
                if ($cart->rowCount()>0) {
                
                ?>
                <div class="col-lg-5">
                    <?php
                    $SQLstring_add = sprintf("SELECT * FROM addbook WHERE user_id = %d ORDER BY addressid DESC", $_SESSION['id']);
                    $adds = $link->query($SQLstring_add);
                    if ($adds->rowCount() > 0) {
                    ?>
                        <div>
                            <u>
                                <h5>Choose Address</h5>
                            </u>
                            <div class="input-group row d-flex align-items-center p-1" id="radioInputGroup">
                                <?php while ($data2 = $adds->fetch()) { ?>
                                    <div class="col-1">
                                        <input type="radio" name="gridRadios" value="<?php echo $data2['addressid'] ?>" <?php echo ($data2['setdefault']) ? 'checked' : ''; ?>>
                                    </div>
                                    <div class="col-2"><?php echo $data2['cname']; ?></div>
                                    <div class="col-3"><?php echo $data2['phone'] ?></div>
                                    <div class="col-5"><?php echo $data2['address'] ?></div>
                                    <div class="col-1"><button class="btn btn-sm btn-light" type="button" id="btn[]" name="btn[]" onclick="btn_confirmLink('Remove This Address?','address_del.php?mode=1&addressid=<?php echo $data2['addressid']; ?>');">x</button></div>
                                    <hr>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div>
                        <u>
                            <h5 class="mt-5">Add New Address</h5>
                        </u>
                        Name: <br>
                        <input class="form-control" type="text" id="name"><br>
                        Phone Number: <br>
                        <input class="form-control" type="text" id="phone"><br>
                        Address: <br>
                        <input class="form-control" type="text" id="address"><br>
                        <span id="msg"></span>
                        <div class="my-3 text-start">
                            <button id="add_btn" class="btn btn-sm btn-dark">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <u>
                        <h5>Items</h5>
                    </u>
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
                        <div class="col-2">$:50</div>

                        <div class="col-10 my-3">Total: </div>
                        <div class="col-2"><b>$: <?php echo $total + 50; ?></b></div>
                        <textarea id="note" class="form-control" rows="5" maxlength="200" placeholder="Leave Notes..."></textarea>

                    </div>
                </div>
                <hr>
                <?php 
                $SQLstring_add_default = sprintf("SELECT * FROM addbook WHERE user_id = %d AND setdefault=1", $_SESSION['id']);
                $add_default = $link->query($SQLstring_add_default);
                if ($add_default->rowCount() > 0) { ?>
                    <div class="col-10 my-5 text-center">
                        <a href="cart.php"><button class="btn btn-outline-dark">Cart</button></a>
                        <button class="btn btn-dark" id="checkout_btn">Check Out</button>
                    </div>
                <?php } else { ?>
                    <div class="col-10 my-5 text-center">
                        <p>Add or Select a Shipping Address to Proceed</p><br>
                        <a href="cart.php"><button class="btn btn-outline-dark">Cart</button></a>
                    </div>
                    <?php  } ?>
                    <?php } else { ?>
                        <div class="text-center">
                            No Item in Cart, <a href="./products.php"><button class="btn btn-sm btn-dark">Go Shop</button></a>
                        </div>
                    <?php  } ?>



            <?php } else { ?>
                <div class="text-center">
                    <a href="member.php"><button class="btn btn-sm btn-dark">Please Login</button></a>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>

    <script>
        const checkout_btn = document.querySelector('#checkout_btn');
        checkout_btn.addEventListener('click', ()=>{
            let addressid = document.querySelector('input[name=gridRadios]:checked');
            let note = document.querySelector('#note');
            if (addressid) {
            fetch('./addorder.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    addressid: addressid.value,
                    note: note.value,
                })
            })
            .then(response=>response.json())
            .then(data=>{
                notice(data.message);
                if (data.success) {
                    setTimeout(()=>{
                        window.location.href ='./member.php';
                    }, 1000);
                }
            })
            .catch(error=>{
                notice('Unexpected Error Occured, Please Try Again Later');
                console.log(error);
            })
        } else {
            notice('Please Select or Add an Address');
        }
        })
    </script>

    <script>
        const inputgroup = document.querySelector('#radioInputGroup');
        inputgroup.addEventListener('change', (event) => {
            // console.log(event.target.value)
            if (event.target && event.target.nodeName == 'INPUT') {
                let id = event.target.value;
                fetch('./changeaddress.php', {
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            addressid: event.target.value,
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        notice(data.message)
                        window.location.reload();  
                    })
                    .catch(error => {
                        notice('Unexpected Error Occured, Please Try Again Later');
                        console.log(error);
                    })
            }
        })
    </script>

    <script>
        const add_btn = document.querySelector('#add_btn');
        add_btn.addEventListener('click', () => {
            let name = document.querySelector('#name');
            let address = document.querySelector('#address');
            let phone = document.querySelector('#phone');
            let msg = document.querySelector('#msg');
            if (name.value && address.value && phone.value) {
                fetch('./addaddress.php', {
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: name.value,
                            phone: phone.value,
                            address: address.value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        notice(data.message);
                        if (data.success) {
<<<<<<< HEAD
=======
                            notice(data.message);
                            msg.innerHTML = data.message;
                            msg.style.color = 'green';
>>>>>>> 1f8b8b6 (daily update)
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000)
                        } else {
                            console.log(data.message);
<<<<<<< HEAD
=======
                            notice(data.message);
>>>>>>> 1f8b8b6 (daily update)
                        }
                    })
                    .catch(error => {
                        notice('Unexpected Error Occured, Please Try Again Later');
                        console.log(error);
                    })
            } else {
                notice('Insert Name, Phone, and Address');
                msg.innerHTML = 'Insert Name, Phone, and Address';
                msg.style.color = 'red';
            }
        })
    </script>
</section>