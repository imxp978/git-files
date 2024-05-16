<?php
if(isset($_POST['flag'])) {
    require_once("Connections/dbset.php");
    
    $cname = $_POST['cname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message= $_POST['message'];

    $SQLstring = sprintf("INSERT INTO feedback (cname, tel, email, address, message) VALUES ('%s', '%s', '%s', '%s', '%s')", $cname, $tel, $email, $address, $message);

    $result=$link->query($SQLstring);
    if($result) {
        echo "<script>alert('謝謝您 送出資料已收到 將盡速與您聯絡 ');</script>";
    } else {
        echo "<script>alert('無法寫入 請聯絡管理員');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap offline</title>
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="website01.css">
    <link rel="stylesheet" href="style01.scss">
    <style>
        body {
            padding: 0;
            margin: 0;
            height: 3000px;
        }

        #mainmenu {
            position: relative;
            width: 100%;
            height: 3000px;
            background-image: url("images/pic86.jpg");
            background-attachment: fixed;
            z-index: 99;
        }

        #sportlogo {
            padding-top: 40px;
        }

        #guess {
            padding-top: 40px;
        }

        #buyrules {
            padding-top: 40px;
            padding-bottom: 50px;
        }

        .bgcolor {
            color:white;
            background-color: #e47303;
        }

        .box {
            border-radius: 6px;
            background-color: #e5e5e5;
        }

        #footer {
            padding-top: 10px;
            background-color: #2C3E50;
            color: white;
        }

        .navbar-nav .nav-item img {
            margin-top: -15px;
            margin-right: 10px;
        }

        .dropdown:hover>.dropdown-menu, 
        .dropend:hover>.dropdown-menu {
            display: block;
            margin-top: 0.125em;
            margin-left: 0.125em;
            margin-right: 80%;
        }

        .dropdown .dropdown-menu {
            display: none;
        }

        @media screen and (min-width: 993px) {
            .dropend:hover>.dropdown-menu {
                position: absolute;
                top: 0;
                left: 100%;
            }
        }
    </style>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <section id="mainmenu">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-good">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><i class="fas fa-home" style="color:red; font-size:40px; margin-top:-5px; margin-left:5px;"></i></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><img src="images/lincanLogo.png" alt="LOGO" class="image-fluid"></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      測試中心</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item dropend">    
                            <a class="dropdown-item dropdown-toggle" href="#">Submenu-1</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">item1</a></li>
                                <li><a class="dropdown-item" href="#">item2</a></li>
                                <li><a class="dropdown-item" href="#">item3</a></li>
                            </ul>
                        </li>                    
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#production">站長推薦</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#sportlogo">品牌精選</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#buyrules">服務說明</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#contact">聯絡我們</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      會員中心
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">訂單查詢</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">退訂／退款查詢</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">現金積點查詢</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">折價券查詢</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">登入</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">註冊</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">登出</a>
                  </li>
                  <li class="nav-item">            
                    <form class="d-flex" role="search">
                    <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </li>
                  
                </form>
                </ul>

              </div>
            </div>
          </nav>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="jumbotron">
                    <h1 class="display-4">讓我們一起動起來！</h1>
                    <p class="lead">在運動出汗的過程中，皮膚的新陳代謝加快，毒素排出體外，而且出汗還能夠幫助清潔毛孔，有效護膚美容。</p>
                    <hr class="my-4">
                    <p>讓我們提供一雙好的運動鞋來幫助你。</p>
                    <p>林肯運動鞋專賣店-電子商店</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Show more</a>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="production">
        <div class="container text-center">
            <div class="row">
                <div class="col-xl-12">
                    <h2>站長推廌熱銷運動鞋</h2>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-4"> <img src="images/pic61.jpg" alt="adidas 休閒慢跑鞋" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">adidas 休閒慢跑鞋</h5>
                        <p class="card-text">Loop Racer 全黑 復古 運動鞋 男鞋 女鞋 B42446，愛迪達 Originals 三葉草 輕量透氣舒適運動球鞋穿搭推薦,男女款情侶鞋</p>
                        <p class="card-text">NT2500</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4"> <img src="images/pic62.jpg" alt="Reebok 休閒慢跑鞋" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Reebok 休閒慢跑鞋</h5>
                        <p class="card-text">Reebok Insta Pump Fury SP 藍 灰 麂皮 潑漆 雪花 休閒鞋 男鞋 平底鞋 休閒鞋 慢跑鞋 球鞋 情侶運動鞋 採用貼腳針織鞋面和仿形模製鞋跟</p>
                        <p class="card-text">NT4580</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4"> <img src="images/pic63.jpg" alt="Nike 阿甘鞋" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Nike 阿甘鞋</h5>
                        <p class="card-text">Classic Cortez Leather 復古慢跑鞋 白藍紅 OG 原版配色 女鞋 漢娜妞 松本惠奈 女孩球鞋穿搭推薦款式 百搭熱銷款 皮面不容易髒</p>
                        <p class="card-text">NT3380</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-4"> <img src="images/pic64.jpg" alt="Puma 慢跑鞋" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Puma 慢跑鞋</h5>
                        <p class="card-text">Speed 600 Ignite Pwrcool Wn 黃銀 運動 女鞋 188521-02 Running 超輕量透氣 低筒 跑步健身訓練推薦鞋款</p>
                        <p class="card-text">NT2880</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4"> <img src="images/pic65.jpg" alt="Asics 慢跑鞋" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Asics 慢跑鞋</h5>
                        <p class="card-text">競速跑鞋 Tartherzeal 4 藍 橘 白底 男鞋 輕量 運動鞋 TJR282-5230 Racing 低筒 虎走 馬拉松 路跑推薦款式 特殊專業跑鞋設計</p>
                        <p class="card-text">NT3490</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
                <div class="card col-md-4"> <img src="images/pic66.jpg" alt="美津濃 Mizuno Prophecy 5" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">美津濃 Mizuno Prophecy 5</h5>
                        <p class="card-text">美津濃 Mizuno Prophecy 5藍黃 彈簧 慢跑鞋 男鞋 J1GC16-0047 Running U4ic中底材質,X10耐磨INFINITY WAVE大底</p>
                        <p class="card-text">NT4580</p>
                        <a href="#" class="btn btn-primary">更多資訊</a>
                        <a href="#" class="btn btn-sucess">放購物車</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-2">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a href="#" class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item">
                            <a href="#" class="page-link">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <hr>
    <section id="sportlogo">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2>品牌精選</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3"><img src="images/pic71.jpg" class="img-fluid" title="adidas" alt="adidas"></div>

                <div class="col-sm-3"><img src="images/pic72.jpg" class="img-fluid" title="Reebok" alt="Reebok"></div>

                <div class="col-sm-3"><img src="images/pic73.jpg" class="img-fluid" title="Mizuno" alt="Mizuno"></div>

                <div class="col-sm-3"><img src="images/pic74.jpg" class="img-fluid" title="Nike" alt="Nike"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><img src="images/pic75.jpg" class="img-fluid" title="Kappa" alt="Kappa"></div>

                <div class="col-sm-3"><img src="images/pic76.jpg" class="img-fluid" title="PUMA" alt="PUMA"></div>

                <div class="col-sm-3"><img src="images/pic77.jpg" class="img-fluid" title="Converse" alt="Converse"></div>

                <div class="col-sm-3"><img src="images/pic78.jpg" class="img-fluid" title="SPRIT" alt="SPRIT"></div>
            </div>
        </div>
    </section>
    <hr>
    <section id="guess">
        <div class="container text-center">
            <div class="row">
                <div class="col-xl-12">
                    <h2>猜你喜歡</h2>
                </div>
            </div>
            <div class="row">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew01.webp" alt="【SKECHERS】女 慢跑系列 GORUN TRAIL ALTITUDE(128203RAS)">
                                    <div class="card-body">
                                        <h5>【SKECHERS】女 慢跑系列 GORUN TRAIL ALTITUDE(128203RAS)</h5>
                                        <p class="card-text">
                                            品號：8844911<br>
                                            加深刻紋的橡膠大底<br>
                                            輕量回彈避震緩衝中底<br>
                                            防潑水鞋面設計<br>
                                            市售價2,790元 促銷價1,990<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew02.webp" alt="【【NIKE 耐吉】籃球鞋 PG 6 EP 男鞋 女鞋 黑白(DH8447001)">
                                    <div class="card-body">
                                        <h5>【NIKE 耐吉】籃球鞋 PG 6 EP 男鞋 女鞋 黑白(DH8447001)</h5>
                                        <p class="card-text">
                                            品號：10130074<br>
                                            Nike React 泡綿中底<br>
                                            中足鞋眼式固定鞋帶融為一體<br>
                                            橡膠外底提供多向抓地表現<br>
                                            市售價3,800元 促銷價2,584元<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew03.webp" alt="【NIKE 耐吉】慢跑鞋 NIKE AIR ZOOM PEGASUS 39 男鞋 灰黑(DH4071004)">
                                    <div class="card-body">
                                        <h5>【NIKE 耐吉】慢跑鞋 NIKE AIR ZOOM PEGASUS 39 男鞋 灰黑(DH4071004)</h5>
                                        <p class="card-text">
                                            品號：10243109<br>
                                            出眾腳感舒適包覆雙足<br>
                                            足底兩個Zoom Air 緩震<br>
                                            Flywire 技術<br>
                                            市售價3,500元 促銷價2,380元<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew04.webp" alt="【【asics 亞瑟士】JOLT 男女中性款 寬楦 慢跑 跑鞋 運動鞋(多款任選)">
                                    <div class="card-body">
                                        <h5>【asics 亞瑟士】JOLT 男女中性款 寬楦 慢跑 跑鞋 運動鞋(多款任選)</h5>
                                        <p class="card-text">
                                            品號：10138374<br>
                                            經典造型和絕佳腳感<br>
                                            在奔跑中讓腳步的移動更流暢<br>
                                            鞋款偏小，建議選擇大半號<br>
                                            市售價1,880元 促銷價1,499元<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew05.webp" alt="【adidas 愛迪達】慢跑鞋 RESPONSE SR 女款 多款任選(GZ8428 GZ8425)">
                                    <div class="card-body">
                                        <h5>【adidas 愛迪達】慢跑鞋 RESPONSE SR 女款 多款任選(GZ8428 GZ8425)</h5>
                                        <p class="card-text">
                                        品號：9314683
                                        網布鞋面搭配支撐性貼條
                                        彈性泡棉雙區緩震設計
                                        Cloudfoam 中底
                                        市售價2,890元 促銷價1,390元
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew06.webp" alt="【LOTTO】女鞋 絆帶氣墊跑鞋/增高美型健走鞋/厚底美型輕便鞋(多款任選)">
                                    <div class="card-body">
                                        <h5>【LOTTO】女鞋 絆帶氣墊跑鞋/增高美型健走鞋/厚底美型輕便鞋(多款任選)</h5>
                                        <p class="card-text">
                                        品號：8812979
                                        飛織網布材質，柔軟透氣
                                        舒壓避震乳膠鞋墊，耐磨止滑
                                        增厚底設計，能修飾腿部線條
                                        市售價1,390元 促銷價699元
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew07.webp" alt="【MIZUNO 美津濃】MIZUNO MAXIMIZER 24 一般型寬楦男款慢跑鞋 K1GA2200XX(慢跑鞋)">
                                    <div class="card-body">
                                        <h5>【MIZUNO 美津濃】MIZUNO MAXIMIZER 24 一般型寬楦男款慢跑鞋 K1GA2200XX(慢跑鞋)</h5>
                                        <p class="card-text">
                                        品號：9830301
                                        適合一般慢跑或步行
                                        輕運動與慢跑初學者需求
                                        促銷價1,680元 折扣後價格1,530元
                                        </p>
                                    </div>
                                </div>
                                <div class="card col-md-3">
                                    <img class="card-img-top" src="images/picnew08.webp" alt="【SKECHERS】女 慢跑系列 GORUN MAX CUSHIONING ARCH FIT(128303CHAR)">
                                    <div class="card-body">
                                        <h5>【SKECHERS】女 慢跑系列 GORUN MAX CUSHIONING ARCH FIT(128303CHAR)</h5>
                                        <p class="card-text">
                                        品號：9805973
                                        ULTRA GO中底
                                        大底高磨耗區添加固特異橡膠
                                        動態型足弓適應鞋墊
                                        市售價3,590元 促銷價3,052元
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    </section>
    <hr>
    <section id="buyrules" class="bgcolor">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h2><i class="fas fa-envelope" aria-hidden="true"></i></h2>
                    <h2>我們的服務</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h2><i class="fas fa-user" aria-hidden="true"></i></h2>
                    <h4>購物須知</h4>
                    <p>★如本店有正當理由無法接受您的訂單，將於收到您的訂單後二個工作日附正當理由通知您。但已付款者視為契約成立。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-comment-dots fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-align-justify" aria-hidden="true"></i></h2>
                    <h4>付款方式</h4>
                    <p>★超商付款取貨，至超商取貨時付款，全家繳費不取貨，適用無卡片轉帳且需宅配取件的顧客，線上刷卡，信用卡一次付清。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-user fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-angle-double-down" aria-hidden="true"></i></h2>
                    <h4>交貨方式</h4>
                    <p>★黑貓宅配包裹：寄出後1-2天送達，可選擇送達時段，郵局包裹寄送：寄出後1-2天送達，外島地區寄出後3-7天送達。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-thumbs-up fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-address-card" aria-hidden="true"></i></h2>
                    <h4>退換貨說明</h4>
                    <p>★登入填寫退貨單，由平台請宅配收取退貨，需完整保留商品及其配件，並簡易包裝保護商品，勿直接使用膠帶黏貼商品。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-ambulance fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-ambulance" aria-hidden="true"></i></h2>
                    <h4>出貨時間</h4>
                    <p>★每日商品依訂單成立時間，服務時間星期一至星期五 9:30-21:30，(星期六、日及特定國定假日，無提供出貨服務)。</p>
                    <button class="btn btn-sm btn-danger"><i class="fas fa-balance-scale fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
                <div class="col-sm-2">
                    <h2><i class="fas fa-anchor" aria-hidden="true"></i></h2>
                    <h4>連絡方式</h4>
                    <p>★(02)7717-9177 分機202 電子商城客服專員，服務時間：星期一至五 9:30-18:30 (12:30-13:30為午休時間)。</p>
                    <button class="btn btn-sm btn-danger"><<i class="fas fa-blender fa-lg pe-2" aria-hidden="true"></i>Show More</button>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="contact">
        <div class="container text-center box">
            <div class="row">
                <div class="col-sm-12 pt-3">
                    <h2>聯絡我們</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <form action="main.php" method="POST" name="form1" id="form1">
                        <div class="row"><input type="text" class="form-control" name="cname" id="cname" placeholder="Name" required></div><br>
                        <div class="row">
                            <input type="number" class="form-control" name="tel" id="tel" placeholder="TEL" required></div><br>
                        <div class="row">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required></div><br>
                        <div class="row">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required></div><br>
                        <div class="row">
                            <textarea rows="6" type="text" class="form-control" name="message" placeholder="Message" required></textarea>
                            <input type="hidden" name="flag" id="flag" value="form1"></div><br>
                            <button type="submit" class="btn btn-primary btn-lg mx-auto">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <h4>林肯運動鞋專賣店 地址：40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-555666</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">COPYRIGHT &copy; LINCAN SPORT SERVICE CO, ALL RIGHT RESERED.</div>
            </div>
        </div>
    </section>
    <hr>
    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
</body>

</html>