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