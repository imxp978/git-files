<?php
//建立廣告輪播carousel資料查詢
$SQLstring = "SELECT * FROM carousel WHERE caro_online=1 ORDER BY caro_sort";
$carousel = $link->query($SQLstring);
$i = 0; //control active start
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php for ($i = 0; $i < $carousel->rowCount(); $i++) { ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>"
                class="<?php echo activeShow($i, 0); ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>">
            </button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php
        $i = 0;
        while ($data = $carousel->fetch()) { ?>
            <div class="carousel-item <?php echo activeShow($i, 0); ?>">
                <a href="goods.php?p_id=<?php echo $data['p_id']; ?>">
                    <img src="product_img/<?php echo $data['caro_pic']; ?>" class="d-block w-100"
                        alt="<?php echo $data['caro_title']; ?>"></a>

                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $data['caro_title']; ?></h5>
                    <p><?php echo $data['caro_content']; ?></p>
                </div>
            </div>
        <?php $i++;
        }
        ?>
    </div>
    <a href="#carouselExampleCaptions" class="carousel-control-prev" role="button"
        data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a href="#carouselExampleCaptions" class="carousel-control-next" role="button"
        data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>