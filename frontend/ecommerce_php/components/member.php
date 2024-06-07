<section id="member">

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once('connections/conn_db.php');
    ?>
    <div class="container text-center">
        <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
            <h3 class="my-5">Hi, <?php echo $_SESSION['email']; ?></h3>
            <hr>
            <?php
            $SQLstring_order = sprintf("SELECT uorder.orderid, uorder.create_time as ordertime, uorder.remark, ms1.msname as payment_method, ms2.msname as status, addbook. *
                FROM addbook, multiselect as ms1, multiselect as ms2, uorder 
                WHERE ms2.msid=uorder.status AND ms1.msid=uorder.payment_method AND uorder.user_id=%d AND uorder.addressid=addbook.addressid 
                ORDER BY uorder.create_time DESC", $_SESSION['id']);
            $orders = $link->query($SQLstring_order);

            ?>
            <div class="container">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                        <div class="container">
                            <div class="row text-start">
                                <div class="col-2"><b>Order#</b></div>
                                <div class="col-2"><b>Time</b></div>
                                <div class="col-1"><b>Payment</b></div>
                                <div class="col-1"><b>Status</b></div>
                                <div class="col-2"><b>Name</b></div>
                                <div class="col-3"><b>Address</b></div>
                                <div class="col-1"><b>Note</b></div>
                            </div>
                            <hr>
                        </div>
                    <?php $i = 0;
                    while ($data = $orders->fetch()) { ?>
                        <div class="accordion-item mt-5">
                            <div class="accordion-header" id="flush-heading<?php echo $i; ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <div class="container bg-light bg-gradient">

                                        <hr>
                                        <div class="row text-start">
                                            <div class="col-2"><?php echo $data['orderid']; ?></div>
                                            <div class="col-2"><?php echo $data['ordertime']; ?></div>
                                            <div class="col-1"><?php echo $data['payment_method']; ?></div>
                                            <div class="col-1"><?php echo $data['status']; ?></div>
                                            <div class="col-1"><?php echo $data['cname']; ?></div>
                                            <div class="col-4"><?php echo $data['address']; ?></div>
                                            <div class="col-1"><?php echo $data['remark']; ?></div>
                                        </div>
                                        <hr>
                                    </div>
                                </button>
                            </div>
                            <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 0) ? 'show' : ''; ?>" aria-labelledby="flush-heading<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body row text-center">
                                    <div class="container col-10 border-bottom border-end bg-gray">
                                        <hr>
                                        <div class="row text-start">
                                            <div class="col-1"></div>
                                            <div class="col-3">item</div>
                                            <div class="col-2">price</div>
                                            <div class="col-2">quantity</div>
                                            <div class="col-2">subtotal</div>
                                            <div class="col-2">note</div>
                                        </div>
                                        <hr>

                                        <?php
                                        $SQLstring = sprintf("SELECT *, ms1.msname as status 
                                    FROM cart, product, product_img, multiselect as ms1 
                                    WHERE cart.orderid = '%s' AND ms1.msid=cart.status AND cart.p_id=product_img.p_id AND product.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cart.create_date DESC", $data['orderid']);
                                        $items = $link->query($SQLstring);
                                        $total = 0;
                                        while ($data2 = $items->fetch()) { ?>
                                            <div class="row text-start d-flex justify-content-start align-items-center">
                                                <div class="col-1"><img src="images/product_images/<?php echo $data2['img_file']; ?>" width="50px" alt=""></div>
                                                <div class="col-3"><?php echo $data2['p_name']; ?></div>
                                                <div class="col-2"><?php echo $data2['p_price']; ?></div>
                                                <div class="col-2"><?php echo $data2['qty']; ?></div>
                                                <div class="col-2"><?php echo $data2['p_price'] * $data2['qty']; ?></div>
                                                <div class="col-2"></div>

                                            </div>
                                            <hr>

                                        <?php $total += $data2['p_price'] * $data2['qty'];
                                            $i++;
                                        } ?>
                                        <div class="col-12 text-end">Shipping: $:50</div>
                                        <div class="col-12 text-end">Total: $: <?php echo $total + 50; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
                <a href="logout.php"><button type="submit" class="btn btn-sm btn-dark">Logout</button></a>
            </div>

        <?php } else { ?>

            <div id="login" name="login">
                <h3 class="mt-5">LOGIN</h3>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 col-10">
                        Email:
                        <input class="form-control m-1 input-sm" type="email" value="test@test.com" id="inputEmail" required autofocus />
                        Password:
                        <input class="form-control m-1 input-sm" type="password" value="111111" id="inputPassword" required />
                        <span id="msg"></span><br>
                        <div class="my-3"></div>
                        <a href="register.php"><button class="btn btn-sm btn-outline-dark">Sign Up</button></a>
                        <button class="btn btn-sm btn-dark" id="login_btn">Login</button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <hr>
        <script>
            const email = document.querySelector('#inputEmail');
            const password = document.querySelector('#inputPassword');
            const login_btn = document.querySelector('#login_btn');
            const msg = document.querySelector('#msg');
            login_btn.addEventListener('click', () => {
                // console.log('login_btn clicked');
                // msg.textContent = 'start';
                if (email.value && password.value) {
                    // console.log('email & password')
                    fetch('./login.php', {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                email: email.value,
                                password: password.value
                            })
                        })
                        // .then((response) => {
                        //     return response.json()
                        //     console.log('response received');
                        // })
                        .then(response => response.json())
                        .then(data => {
                            // console.log(data);
                            // console.log('json converted');
                            notice(data.message);
                            if (data.success) {
                                // console.log('login successful');
                                msg.textContent = data.message;
                                msg.style.color = 'green';
                                setTimeout(window.location.href = 'index.php', 1000);
                            } else {
                                msg.textContent = data.message;
                                msg.style.color = 'red';

                            }
                        })
                        .catch((error) => {

                        })
                } else {
                    msg.textContent = 'Please Insert Email and Password'
                    msg.style.color = 'red';
                    notice(msg.textContent);

                }
            })
        </script>
</section>