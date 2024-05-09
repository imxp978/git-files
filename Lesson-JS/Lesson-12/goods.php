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

                    <!-- 引入breadCrumb模組 -->
                    <?php require_once('breadcrumb.php') ?>
                    <!-- 引入商品列表模組 -->
                    <?php //require_once('goods_content.php') 
                    ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img id="showGoods" name="showGoods" src="product_img/zoom2555551.webp" class="img-fluid rounded-start" alt="Biore 蜜妮">
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <a href="product_img/zoom2555551.webp"><img src="product_img/zoom2555551.webp" alt="蜜妮" class="img-fluid"></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="product_img/zoom2555552.webp"><img src="product_img/zoom2555552.webp" alt="蜜妮" class="img-fluid"></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="product_img/zoom2555553.webp"><img src="product_img/zoom2555553.webp" alt="蜜妮" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Biore蜜妮</h5>
                                    <p class="card-text">全新升級無負擔This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <h4 class="color_e600a0">$125</h4>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-text color-success" id="inputGroup-sizing-lg">數量</span>
                                                <input type="number" id="qty" name="qty" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <button name="button01" id="button01" type="button" class="btn btn-success btn-lg color-success">
                                                加入購物車
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once('drop-box.php')?>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>

<?php
function activeShow($num, $chkPoint)
{
    return (($num == $chkPoint) ? 'active' : '');
}
?>