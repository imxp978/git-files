<section id="reviews" style="width: 100%">
    <?php $SQLstring = "SELECT * FROM review";
    $review = $link->query($SQLstring); ?>
    <div class="container text-center mx-auto px-5 py-5">
      <h3 class="my-5 movable slideIn">REVIEWS</h3>
      <div class="row gy-10 gx-5">
        <?php $i = 0;
        while ($data = $review->fetch()) { ?>
          <div class="card col-6 border-0 border-end border-bottom border-3">
            <div class="row g-5">
              <div class="review col-md-4 movable slideIn slideInLeft">
                <div class="review-image">
                  <img src="./images/user_images/<?php echo $data['image']; ?>" class="img-fluid rounded-start" alt="..." />
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body text-start">
                  <h5 class="card-title"><?php echo $data['user'] ?></h5>
                  <?php for ($j = 0; $j < $data['rate']; $j++) { ?>
                    <i class="fa-solid fa-star"></i>
                  <?php } ?>
                  <p class="card-text"><?php echo $data['content']; ?></p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php $i++;
        } ?>
      </div>
      <hr />
    </div>
  </section>