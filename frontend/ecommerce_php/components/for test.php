<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php 
            $count = $img_rs->rowCount();
            for ($i = 0; $i < $count; $i++) { ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"
                class="<?php echo activeShow($i, 0); ?>"></li>
            <?php } ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $i = 0;
            while ($imgLis2 = $img_rs->fetch()) { ?>
              <div class="carousel-item <?php echo activeShow($i, 0); ?>">
                <img class="d-block h-100 product_image"
                  src="./images/product_images/<?php echo $imgList2['img_file']; ?>">
              </div>
              <?php $i++; } ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>