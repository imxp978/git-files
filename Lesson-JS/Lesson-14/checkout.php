<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php");

//檢查是否登入 若無則導向login.php
if (!isset($_SESSION['login'])) {
    $sPath = "login.php?sPath=checkout";
    header(sprintf('Location:%s', $sPath));
}
?>
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
                    <!-- 引入結帳模組 -->
                    <?php // require_once("checkout.php"); 
                    ?>
                    <h3>電傷藥妝: 會員結帳作業</h3>
                    <div class="row">
                        <div class="card col">
                            <div class="card-header" style="color:#007bff"><i class="fas fa-truck fa-flip-horizontal me-1"></i>
                                配送資訊
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">收件人資訊:</h4>
                                <h5 class="card-title">姓名: 李曉明</h5>
                                <p class="card-text">電話: 0912345678</p>
                                <p class="card-text">郵遞區號: 407 台中市西屯區</p>
                                <p class="card-text">地址: 中正路1號</p>
                                <a href="#" class="btn btn-primary">選擇其他收件人</a>
                            </div>
                        </div>
                        <div class="card col ms-3">
                            <div class="card-header" style="color:#000">
                                <i class="fas fa-truck fa-credit-card me-1"></i>
                                付款方式
                                <div class="card-body pl-3 pt-2 pb-2">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color:#007bff !important; font-size:14pt;">貨到付款</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">信用卡</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">銀行轉帳</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="epayt-tab" data-bs-toggle="tab" data-bs-target="#epay-tab-pane" type="button" role="tab" aria-controls="epay-tab-pane" aria-selected="false" style="color:#007bff !important; font-size:14pt;">電子支付</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <h4 class="card-title pt-3">付款人資訊: </h4>
                                            <h5>姓名: 李曉明</h5>
                                            <p>電話: 0987654321</p>
                                            <p>地址: 401台中市西屯區中正路1號</p>
                                        </div>
                                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                            <h4 class="card-title pt-3">選擇付款帳戶:</h4>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="5%">#</th>
                                                        <th scope="col" width="25%">信用卡</th>
                                                        <th scope="col" width="35%">發卡銀行</th>
                                                        <th scope="col" width="35%">信用卡號</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="creditcard" id="creditCard[]" checked></th>
                                                        <td><img src="images/visa_Inc._logo.svg" class="img-fluid" alt=""></td>
                                                        <td>玉山銀行</td>
                                                        <td>1234 ************</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="creditcard" id="creditCard[]" ></th>
                                                        <td><img src="images/MasterCard_Logo.svg" class="img-fluid" alt=""></td>
                                                        <td>玉山銀行</td>
                                                        <td>1234 ************</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="creditcard" id="creditCard[]" ></th>
                                                        <td><img src="images/UnionPay_logo.svg" class="img-fluid" alt=""></td>
                                                        <td>玉山銀行</td>
                                                        <td>1234 ************</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                            <h4 class="card-title pt-3">ATM換款資訊</h4>
                                            <img src="images/Cathay-bk-rgb-db.svg" class="img-fluid" alt="">
                                            <h5 class="card-title">匯款銀行:國泰世華銀行 銀行代碼:013</h5>
                                            <h5 class="card-title">姓名:林曉強</h5>
                                            <p class="card-text">匯款帳號:1234-5678-1234-5678</p>
                                            <p class="card-text">備註: 匯款完成後須1 2個工作天，帶系統入帳後將以簡訊通知訂單完成付款。</p>
                                        </div>
                                        <div class="tab-pane fade" id="epay-tab-pane" role="tabpanel" aria-labelledby="epay-tab" tabindex="0">
                                            <h4 class="card-title pt-3">選擇電子支付:</h4>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="5%">#</th>
                                                        <th scope="col" width="25%">電子支付系統</th>
                                                        <th scope="col" width="70%">電子支付公司</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="epay" id="epay[]" checked></th>
                                                        <td><img src="images/Apple_Pay_logo.svg" class="img-fluid" alt=""></td>
                                                        <td>Apple Pay</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="epay" id="epay[]" ></th>
                                                        <td><img src="images/Line_pay_Logo.svg" class="img-fluid" alt=""></td>
                                                        <td>Line Pay</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio" name="epay" id="epay[]" ></th>
                                                        <td><img src="images/JKOPAY_Logo.svg" class="img-fluid" alt=""></td>
                                                        <td>JKOPAY</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                    <tr class="text-bg-primary">
                                        <td width="10%">產品編號</td>
                                        <td width="10%">圖片</td>
                                        <td width="30%">名稱</td>
                                        <td width="15%">價格</td>
                                        <td width="15%">數量</td>
                                        <td width="20%">小計</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="product_img/zoom-front-174388.webp" class="img-fluid" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                    露 升級版 SPF 50/PA++++ 01白皙色"></td>
                                        <td>Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                            露 升級版 SPF 50/PA++++ 01白皙色</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999</h4>
                                        </td>
                                        <td>10</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="product_img/zoom-front-174388.webp" class="img-fluid" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                    露 升級版 SPF 50/PA++++ 01白皙色"></td>
                                        <td>Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                            露 升級版 SPF 50/PA++++ 01白皙色</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999</h4>
                                        </td>
                                        <td>10</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="product_img/zoom-front-174388.webp" class="img-fluid" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                    露 升級版 SPF 50/PA++++ 01白皙色"></td>
                                        <td>Maybelline 媚比琳純淨礦物極效幻膚BB凝
                                            露 升級版 SPF 50/PA++++ 01白皙色</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999</h4>
                                        </td>
                                        <td>10</td>
                                        <td>
                                            <h4 class="color_e600a0 pt-1">$999></h4>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">累計: 123456</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">運費: 100</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">總計: 123456</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <button type="button" id="btn04" name="btn04" class="btn btn-danger">
                                                <i class="fas fa-cart-arrow-down pr-2"></i>確認結帳
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

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