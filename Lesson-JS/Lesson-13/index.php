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
                    <!-- 引入輪播模組 -->
                    <?php require_once('carousel.php'); ?>
                    <hr>
                    <!-- 引入商品列表模組 -->
                    <?php require_once('product_list.php') ?>
                </div>
                <!-- <div class="row text-center"> -->
            </div>
        </div>
        </div>
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
</body>

</html>

<?php
    function activeShow($num, $chkPoint)
    {
        return (($num == $chkPoint) ? 'active' : '');
    }
?>