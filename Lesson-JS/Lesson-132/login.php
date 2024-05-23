<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once('php_lib.php'); ?>

<?php

if (isset($_GET['sPath'])) {
  $sPath = $_GET['sPath'] . ".php";
} else {
  $sPath = 'index.php';
}

if (isset($_SESSION['login'])) {
  header(sprintf('location:%s', $sPath));
}

?>



<!doctype html>
<html lang="zh_TW">

<head>
  <?php require_once('headfile.php'); ?>
  <style>
    .col-md-10 {
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    .mycard.mycard-containter {
      max-width: 400px;
      height: 450px;
    }

    .mycard {
      background-color: #f7f7f7;
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 50px;
      border-radius: 10px;
    }

    .profile-img-card {
      margin: 0 auto 10px auto;
      display: block;
      width: 100px;
    }

    .profile-name-card {
      font-size: 20px;
      text-align: center;
    }

    .form-signin input[type="email"],
    .form-signin input[type="password"],
    .form-signin button {
      width: 100%;
      height: 44px;
      font-size: 16px;
      display: block;
      margin-bottom: 20px;
    }

    .btn.btn-signin {
      font-weight: 700;
      background-color: rgb(104, 145, 162);
      color: white;
      height: 38px;
      transition: background-color 1s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
      background-color: rgb(12, 97, 33);
    }

    .orther a {
      color: rgb(104, 145, 162);
    }

    .orther a:hover,
    .orther a:active,
    .orther a:focus {
      color: rgb(12, 97, 33);
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

          <div class="mycard mycard-containter">
            <img id="profile-img" src="images/logo03.svg" alt="logo" class="profile-img-card">
            電商藥妝:會員登入

            <form action="" method="POST" class="form-signin" id="form1">
              <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" require autofocus>
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" require>
              <button type="sumit" class="btn btn-signin mt-4">sign in</button>
            </form>
            <div class="other mt-5 text-center">
              <a href="register.php">New user</a>
              <a href="#">Froget the password</a>
            </div>
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

  <div id="loading" name="loading" style="display: none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,.5);z-index:9999;">
    <i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position: absolute;top:50%;left:50%"></i>
  </div>

  <script src="./commlib.js"></script>
  <script>
    $(function() {
      $('#form1').submit(function() {
        const inputAccount = $('#inputAccount').val();
        const inputPassword = MD5($('#inputPassword').val());
        $('#loading').show();


        $.ajax({
          url: 'auth_user.php',
          type: 'post',
          dataType: 'json',
          data: {
            inputAccount: inputAccount,
            inputPassword: inputPassword,
          },
          success: function(data) {
            if (data.c == true) {
              alert(data.m)
              window.location.href = "<?php echo $sPath ?>"
            } else {
              alert(data.m)
            }
          },
          error: function(data) {
            alert('系統目前無法連接到資料庫')
          }
        })

      })
    })
  </script>








</body>

</html>