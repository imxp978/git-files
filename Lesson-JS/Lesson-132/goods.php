<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh_TW">

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

          <?php require_once('sidebar.php'); ?>
          <?php require_once('hot.php'); ?>

        </div>

        <div class="col-md-10">

          <?php require_once('breadcrumb.php'); ?>
          
          <?php //require_once('product_list.php'); 
          ?>

          <?php require_once('goods_content.php'); ?>



        </div>

      </div>

    </div>
    </div>

  </section>

  <hr>

  <section id="scontent">
    <?php require_once('scontent.php'); ?>
  </section>

  <section id="footer">

    <?php require_once('footer.php'); ?>

  </section>

  <?php require_once('jsfile.php'); ?>

  <script>
    $(function() {
      $(".card .row.mt-2 .col-md-4 a").mouseover(function() {
        var imgsrc = $(this).children('img').attr('src')
        $('#showGoods').attr({
          'src': imgsrc
        })
      })
    });

    $('.fancybox').fancybox()
  </script>
</body>


</html>