<section id="checkout">

<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<?php // require_once('connections/conn_db.php'); ?>

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
                <div>
                    <a href="#"><button class="btn btn-sm btn-dark">Check Out</button></a>
                </div>
            </div>
            <div class="col-4">
            cart items
                <ul>
                    <?php 
                        $SQLstring = sprintf("SELECT * FROM cart WHERE ip='%s' AND orderid IS NULL", $_SERVER['REMOTE_ADDR'] );
                        $items = $link->query($SQLstring)
                    ?>
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