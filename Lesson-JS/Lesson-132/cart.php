<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh_TW">

<head>
  <?php require_once('headfile.php'); ?>

  <style>
    table input:invalid {
      border: solid red 3px;
    }
  </style>


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

          <?php require_once('cart_content.php');
          ?>




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
  $('input').change(function() {
  let qty = $(this).val()
  const cartid = $(this).attr("cartid")
  if (qty <= 0 || qty >= 50) {
    alert("更改數量需0以上或小於50以下。")
    return false
  }

  $.ajax({
    url: "change_qty.php",
    type: 'post',
    dataType: 'json',
    data: {
      cartid: cartid,
      qty: qty,
    },
    success: data => {
      if (data.c == true) {
        window.location.reload()
      } else {
        alert(data.m)
      }
    },
    error: data => {
      alert("系統目前無法連接到後台資料庫")
    }
  })
})
</script>

</body>


</html>