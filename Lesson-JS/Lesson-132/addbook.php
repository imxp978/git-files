<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh_TW">

<head>
  <?php require_once('headfile.php'); ?>
  <style>
    .input-group>.form-control {
      width: 100%;
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
          <div class="row">

            <div class="col-lg-12 text-center">
              <h1>會員註冊頁面</h1>
              <p>請輸入相關資料，*為必須輸入欄位</p>
            </div>

          </div>
          <div class="row">

            <div class="row col-lg-8 offset-2 text-left">
              <form action="register.php" id="reg" name="reg" method="POST">
                <div class="input-group mb-3">
                  <input type="email" name="email" id="email" class="form-control" placeholder="請輸入email">
                </div>

                <div class="input-group mb-3">
                  <input type="password" name="pw1" id="pw1" class="form-control" placeholder="請輸入密碼">
                </div>

                <div class="input-group mb-3">
                  <input type="password" name="pw2" id="pw2" class="form-control" placeholder="請再次輸入密碼">
                </div>

                <div class="input-group mb-3">
                  <input type="text" name="cname" id="cname" class="form-control" placeholder="請輸入姓名">
                </div>

                <div class="input-group mb-3">
                  <input type="text" name="tssn" id="tssn" class="form-control" placeholder="請輸入身分證字號">
                </div>

                <div class="input-group mb-3">
                  <input type="text" name="birthday" id="birthday" class="form-control" placeholder="請選擇生日">
                </div>

                <div class="input-group mb-3">
                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="請輸入手機號碼">
                </div>

                <div class="input-group mb-3">
                  <select name="mycity" id="mycity" class="form-control">
                    <option value="">請選擇市區</option>

                    <?php
                    $city = "SELECT * FROM city WHERE State = 0";
                    $city_rs = $link->query($city);
                    while ($city_rows = $city_rs->fetch()) {
                    ?>

                      <option value="<?php echo $city_rows['AutoNo'] ?>"><?php echo $city_rows['Name'] ?></option>

                    <?php } ?>


                  </select>
                </div>

                <div class="input-group mb-3">
                  <select name="myTown" id="myTown" class="form-control">
                    <option value="">請選擇地區</option>
                  </select>
                </div>

                <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號:地址</label>
                <div class="input-group mb-3">
                  <input type="hidden" name="myZip" id="myZip" value="">
                  <input type="text" name="address" id="address" class="form-control" placeholder="請輸入後續地址">
                </div>

                <label for="fileToUpload" class="form-label">上傳照片</label>
                <div class="input-group mb-3">
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" title="請上傳照片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                  <p>
                    <button type="button" class="btn btn-dange" id="uploadForm" name="uploadForm">開始上傳
                    </button>
                  </p>

                  <div id="progress-div01" class="progress" style="width: 100%;display:none;">

                    <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>

                  </div>

                  <input type="hidden" name="uploadname" id="uploadname" value="">
                  <img id="showimg" name="showimg" src="" alt="photo" style="display: none;" class="img-fluid">

                </div>

                <div class="input-group mb-3">
                  <input type="hidden" name="captcha" id="captcha" value="">
                  <a href="javascript:void(0)" title="按我更新認證" onclick="getCaptcha()">
                    <canvas id="can"></canvas>

                  </a>
                  <input type="text" name="recatcha" id="recatcha" class="form-control" placeholder="請輸入驗證碼">
                </div>

                <input type="hidden" name="formct1" id="formct1" value="reg">
                <div class="input-group mb-3">

                  <button type="submit" class="btn btn-success btn-lg">送出</button>

                </div>


              </form>

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
  <script src="./commlib.js"></script>

  <script>
    $("#mycity").change(function() {
      let CNo = $("#mycity").val()
      if (CNo == "") {
        return false
      }
      $.ajax({
        url: 'Town_ajax.php',
        type: 'post',
        dataType: 'json',
        data: {
          CNo
        },
        success: function(data) {
          if (data.c == true) {
            $("#myTown").html(data.m)
            $("#myZip").val("")
          } else {
            alert(data.m)
          }
        },
        error: function(data) {
          alert("系統目前無法連接後台資料庫")
        }
      })
    })

    $("#myTown").change(function() {
      let AutoNo = $("#myTown").val()
      if (AutoNo == "") {
        return false
      }
      $.ajax({
        url: 'Zip_ajax.php',
        type: 'get',
        dataType: 'json',
        data: {
          AutoNo
        },
        success: function(data) {
          if (data.c == true) {
            $("#myZip").val(data.Post)
            $("#zipcode").html(data.Post + data.Cityname + data.Name)
          } else {
            alert(data.m)
          }
        },
        error: function(data) {
          alert("系統目前無法連接後台資料庫")
        }
      })
    })

    function getCaptcha() {
      const inputTxt = document.querySelector('#captcha')

      inputTxt.value = captchaCode('can', 150, 50, "blue", 'white', "28px", 5)
    }
    $(function() {
      getCaptcha()
    })

    
  </script>


</body>


</html>