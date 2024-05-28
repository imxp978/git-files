<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<!doctype html>
<html lang="zh-TW">

<head>
    <?php require_once('headfile.php'); ?>
</head>
<style>
    table input:invalid {
        border: 3px solid red;
    }
</style>

<body>
    <section id="header">
        <?php require_once('navbar.php'); ?>
    </section>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <!-- 引入sidebar module -->
                    <?php require_once('sidebar.php'); ?>
                    <!-- 引入熱銷商品module -->
                    <?php require_once('hot.php'); ?>
                </div>
                <div class="col-md-10">
                    <!-- 購物車內容模組 -->
                    <?php require_once('cart_content.php');
                    ?>
                    <!-- 引入商品列表模組 -->
                    <?php // require_once('product_list.php') 
                    ?>
                </div>
                <!-- <div class="row text-center"> -->
            </div>
        </div>
    </section>
    <section id="scontent">
        <?php require_once('scontent.php'); ?>
    </section>
    <section id="footer">
        <?php require_once('footer.php'); ?>
    </section>
    <?php require_once('jsfile.php'); ?>
    <script>
        function btn_confirmLink(message, url) {
            if (message == "" || url == "") {
                return false;
            }
            if (confirm(message)) {
                window.location = url;
            }
            return false;
        }
    </script>

    <script>
        $("input").change(function() {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 50) {
                alert('數量需大於0 且小於50');
                return false;
            }
            $.ajax({
                url: 'change_qty.php',
                type: 'post',
                dataType: 'json',
                data: {
                    cartid: cartid,
                    qty: qty,
                },
                success: function(data) {
                    if (data.c == true) {
                        // alert(data.m)
                        window.location.reload();
                    } else {
                        alert(data.m);
                    }
                },
                error: function(data) {
                    alert("DB is down!");
                }
            });
        });
    </script>
    <script>
        function addcart(p_id) {
            let qty = $("#qty").val();
            if (qty <= 0) {
                alert("數量不能為零或負數 懂嗎?");
                return false;
            }
            if (qty == undefined) {
                qty = 1;
            } else if (qty >= 50) {
                alert("數量限制50內");
                return false;
            }
            // 利用jquery $.ajax函數呼叫後台的addcart.php

            $.ajax({
                url: "addcart.php",
                type: "get",
                dataType: "json",
                data: {
                    p_id: p_id,
                    qty: qty
                },
                success: function(data) {
                    if (data.c == true) {
                        alert(data.m);
                    }
                },
                error: function(data) {
                    alert("後臺壞了");
                },
            });
        }

        $("input").change(function() {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 50) {
                alert("數量需大於0 且小於50");
                return false;
            }
            $.ajax({
                url: "change_qty.php",
                type: "post",
                dataType: "json",
                data: {
                    cartid: cartid,
                    qty: qty,
                },
                success: function(data) {
                    if (data.c == true) {
                        // alert(data.m)
                        window.location.reload();
                    } else {
                        alert(data.m);
                    }
                },
                error: function(data) {
                    alert("DB is down!");
                },
            });
        });
    </script>

</body>

</html>

<?php
function activeShow($num, $chkPoint)
{
    return (($num == $chkPoint) ? 'active' : '');
}
?>