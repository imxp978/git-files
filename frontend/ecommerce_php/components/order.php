<section id="checkout">

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>

    <?php // require_once('connections/conn_db.php'); 
    ?>

    <div class="container ">
        <h3 class="mt-5 text-center">Checkout</h3>
        <div class="row d-flex justify-content-center">
            <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
                <div class="col-6">
                    address book
                    <div>
                        Ship To: <br>
                        <input class="form-control" type="text"><br>
                        Address: <br>
                        <input class="form-control" type="text"><br>
                        Phone Number: <br>
                        <input class="form-control" type="text"><br>
                    </div>
                </div>
                <div class="col-4">
                    cart items
                    <div class="accordion accordion-flush" id="accordionFlushExample">

                        <?php
                        $SQLstring = sprintf("SELECT * FROM cart WHERE orderid IS NULL AND ip='%s'", $_SERVER['REMOTE_ADDR']);
                        $items = $link->query($SQLstring);
                        $j = 0;
                        while ($data = $items->fetch()) { ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $j; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <?php echo $data['']?>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                        
                        <?php $j++; } ?>
                        
                    </div>
                    <ul>

                        <li>
                            <a href=""></a>
                        </li>


                    </ul>
                </div>




            <?php } else { ?>
                <div class="text-center">
                    <a href="member.php"><button class="btn btn-sm btn-dark">Please Login</button></a>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</section>