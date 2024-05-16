<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<!doctype html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>電商藥粧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">

    <link rel="stylesheet" href="website_s01.css">

</head>

<body>
    <section id="header">
        <?php require_once('navbar.php'); ?>
    </section>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar">
                        <form name="search" id="search" action="" method="get">
                            <div class="input-group">
                                <input type="text" name="search_name" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fas fa-search fa-lg"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <?php
                    //列出產品類別第一層
                    $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
                    $pyclass01 = $link->query($SQLstring);
                    $i = 1; //控制編號順序
                    ?>
                    <div class="accordion" id="accordionExample">
                        <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne<?php echo $i; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>">
                                        <i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i><?php echo $pyclass01_Rows['cname']; ?>
                                    </button>
                                </h2>
                                <?php
                                //列出產品類別對映的第二層資料
                                $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
                                $pyclass02 = $link->query($SQLstring);
                                ?>
                                <div id="collapseOne<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == 1) ? 'show' : ''; ?>" aria-labelledby="headingOne<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <tbody>
                                                <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                                                    <tr>
                                                        <td><a href="#"><em class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em><?php echo $pyclass02_Rows['cname']; ?></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>
                    </div>
                    <?php
                    //熱銷商品
                    //建立熱銷商品查詢
                    $SQLstring = "SELECT * FROM hot,product,product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 order by h_sort";
                    $hot = $link->query($SQLstring);
                    ?>
                    <div class="card text-center mt-3" style="border:none;">
                        <div class="card-body">
                            <h3 class="card-title">站長推薦 熱銷商品</h3>
                        </div>
                        <!-- <img src="product_img/-10-182065.webp" class="card-img-top" alt="...">
                        <img src="product_img/-SPF50-50ml-196690.webp" class="card-img-top" alt="...">
                        <img src="product_img/-Acnes-BB-30g-533727.webp" class="card-img-top" alt="..."> -->
                        <?php while ($data = $hot->fetch()) { ?>
                            <img src="product_img/<?php echo $data['img_file']; ?>" class="card-img-top" alt="HOT<?php echo $data['h_sort']; ?>" title="<?php echo $data['p_name']; ?>">
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-10">
                    <?php
                    //建立廣告輪播carousel資料查詢
                    $SQLstring = "SELECT * FROM carousel WHERE caro_online=1 ORDER BY caro_sort";
                    $carousel = $link->query($SQLstring);
                    $i = 0; //control active start
                    ?>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php for ($i = 0; $i < $carousel->rowCount(); $i++) { ?>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo activeShow($i, 0); ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>">
                                </button>
                            <?php } ?>

                            <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                        </div>
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            while ($data = $carousel->fetch()) { ?>
                                <div class="carousel-item <?php echo activeShow($i, 0); ?>">
                                    <img src="product_img/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="<?php echo $data['caro_title']; ?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5><?php echo $data['caro_title']; ?></h5>
                                        <p><?php echo $data['caro_content']; ?></p>
                                    </div>
                                </div>
                            <?php $i++;
                            }
                            ?>
                            <!-- <div class="carousel-item active">
                            <img src="./product_img/pic1.jpg" class="d-block w-100" alt="雙11！天天最高送1111">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>雙11！天天最高送1111</h5>
                                <p>購物金活動採單日累計消費滿額即可參加登記送活動，活動期間僅需登記一次，部分商品不適用，詳見說明。</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./product_img/pic2.jpg" class="d-block w-100" alt="建康養生的好幫手">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>建康養生的好幫手</h5>
                                <p>黑金鑽土雞18小時純粹滴煉，去油濾渣無膽固醇，殺菌包裝常溫保存，含BACC、雙肌肽、牛磺酸、小分子蛋白質等，可單飲或當高湯華陀扶元堂養生飲品系列3折優惠，歡迎選購
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./product_img/pic3.jpg" class="d-block w-100" alt="頂級保濕面膜，臉部滋養的好幫手">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>頂級保濕面膜，臉部滋養的好幫手</h5>
                                <p>保養界的藝術品！內到外優雅自成一格，堅持保養始於自然，升級膚質0負擔，讓肌膚與生活更美好。源自台灣的國際保養品牌！</p>
                            </div>
                        </div> -->
                        </div>
                        <a href="#carouselExampleCaptions" class="carousel-control-prev" role="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a href="#carouselExampleCaptions" class="carousel-control-next" role="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    <hr>

                    <?php
                    //建立product藥妝商品RS
                    $maxRows_rs = 12; //分頁數量
                    $pageNum_rs = 0; //起始頁面 = 0
                    if (isset($_GET['pageNum_rs'])) {
                        $pageNum_rs = $_GET['pageNum_rs'];
                    }
                    $startRow_rs = $pageNum_rs * $maxRows_rs;

                    //列出產品product查詢
                    $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC", $maxRows_rs);
                    $query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
                    $pList01 = $link->query($query);

                    $i = 1; // 控制每列row產生
                    ?>
                    <?php while ($pList01_Rows = $pList01->fetch()) { ?>
                        <?php if ($i % 4 == 1) { ?><div class="row text-center"><?php } ?>
                            <div class="card col-md-3">
                                <img src="product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                                    <p class="card-text"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></p>
                                    <p>NT<?php echo $pList01_Rows['p_price']; ?></p>
                                    <a href="#" class="btn btn-primary">更多資訊</a>
                                    <a href="#" class="btn btn-success">放購物車</a>
                                </div>
                            </div>
                            <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
                            </div><?php } ?>
                    <?php $i++;
                    } ?>

                </div>

                <!-- <div class="row text-center"> -->

                <div class="row mt-2">
                    <?php //取得目前頁數
                    if (isset($_GET['totalRows_rs'])) {
                        $totalRows_rs = $_GET['totalRows_rs'];
                    } else {
                        $all_rs = $link->query($queryFirst);
                        $totalRows_rs = $all_rs->rowCount();
                    }

                    $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
                    $prev_rs = "&laquo;";
                    $next_rs = "&raquo;";
                    $separator = "|";
                    $max_links = 20;
                    $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>
                            <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
        </div>

        </div>
    </section>
    <section id="scontent">
        <div class="container-fluid">
            <div id="aboutme" class="row text-center">
                <div class="col-md-2"><img src="images/Qrcode02.png" alt="QRCODE" class="img-fluid mx-auto"></div>
                <div class="col-md-2">
                    <i class="fas fa-thumbs-up fa-5x"></i>
                    <h3>關於我們</h3>
                    企業官網<br>
                    招商專區<br>
                    人才招募<br>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-truck fa-5x"></i>
                    <h3>特色服務</h3>
                    大宗採購方案<br>
                    直配大陸<br>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-user fa-5x"></i>
                    <h3>客戶服務</h3>
                    訂單/配送進度查詢<br>
                    取消訂單/退貨<br>
                    更改配送地址<br>
                    追蹤清單<br>
                    12H速達服務<br>
                    折價券說明<br>

                </div>
                <div class="col-md-2">
                    <i class="fas fa-comments-dollar fa-5x"></i>
                    <h3>好康大放送</h3>
                    新會員禮包<br>
                    活動得獎名單<br>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-question fa-5x"></i>
                    <h3>FAQ 常見問題</h3>
                    系統使用問題<br>
                    產品問題資詢<br>
                    大宗採購問題<br>
                    聯絡我們<br>
                </div>
            </div>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid">
            <div id="last-data" class="row text-center">
                <div class="col-md-12">
                    <h6>中彰投分署科技股份有限公司 40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-777888</h6>
                    <h6>企業通過ISO/IEC27001認證，食品業者登錄字號：A-127360000-00000-0</h6>
                    <h6>版權所有 copyright © 2017 WDA.com Inc. All Rights Reserved.</h6>
                </div>
            </div>
        </div>
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