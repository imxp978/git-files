<section id="categories">
    <?php
    $SQLstring = "SELECT * FROM pyclass WHERE level=2";
    $category = $link->query($SQLstring);
    $i = 0;
    ?>
    <div class="container px-5 text-center" py-5>
      <h3 class="my-5 movable slideIn">CATEGORIES</h3>
      <div class="row my-3">
        <?php while ($data = $category->fetch()) { ?>
          <div class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5 movable slideIn">
            <div class="card-image">
              <div class="card-modal" style="z-index: 1">
                <p class="product-link" >
                  <a href="./products.php?classid=<?php echo $data['classid'];?>"> <?php echo $data['cname']; ?> </a>
                </p>
              </div>
              <div class="category-image">
                <a href="./products.php?classid=<?php echo $data['classid'];?>"><img src="./images/category_images/<?php echo $data['image']; ?>" class="card-img-top" alt="..." /></a>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['cname']; ?></h5>
            </div>
          </div>
        <?php } ?>
      </div>
      <hr />
    </div>
  </section>