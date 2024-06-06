<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<?php

//取得要返回的PHP頁面
if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'] . ".php";
} else {
    //登入完成預設要進入首頁
    $sPath = "index.php";
}
//檢查是否玩登入驗證
if (isset($_SESSION['login'])) {
    header(sprintf('location: %s', $sPath));
}
?>
<!doctype html>
<html lang="zh-TW">

<head>
    <?php require_once('headfile.php'); ?>
    <style>
        .col-md-10 {
            background-repeat: no-repeat;
            background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
        }

        .mycard.mycard-container {
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

        profile-name-card {
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

        .other a {
            color: rgb(104, 145, 162)
        }

        .other a:hover,
        .other a:active,
        .other a:focus {
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
                    <!-- 引入sidebar module -->
                    <?php require_once('sidebar.php'); ?>
                    <!-- 引入熱銷商品module -->
                    <?php require_once('hot.php'); ?>
                </div>

                <div class="col-md-10">
                    <!-- 會員登入HTML模組 -->
                    <div class="mycard mycard-container">
                        <img id="profile-img" src="images/logo03.svg" alt="logo" class="profile-img-card">
                        <p id="profile-name" class="profile-name-card">電商藥妝 登入頁面</p>
                        <form action="" method="post" id="form1" name="form1" class="form-signin">
                            <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus>
                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                            <button type="submit" class="btn btn-signin mt-4">SIGN IN</button>
                        </form>
                        <div class="other mt-5 text-center">
                            <a href="register.php">New User</a>
                            <a href="#">Forget password?</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="row text-center"> -->
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <section id="scontent">
        <?php require_once('scontent.php'); ?>
    </section>
    <section id="footer">
        <?php require_once('footer.php'); ?>
    </section>
    <?php require_once('jsfile.php'); ?>
    <script src="commlib.js"></script>
    <script>
        $(function() {
            $("#form1").submit(function() {
                const inputAccount = $('#inputAccount').val();
                const inputPassword = MD5($('#inputPassword').val());
                $('#loading').show();
                // $ajax call auth_user.php
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
                            alert(data.m);
                            //window.location.reload();
                            window.location.href = "<?php echo $sPath; ?>"
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert('cant access, db is down');
                    }
                });
            });
        });
    </script>

    <!-- <script>
        // JS vanilla
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form1').addEventListener('submit', function(event) {
                event.preventDefault(); // 防止表单默认提交

                const inputAccount = document.getElementById('inputAccount').value;
                const inputPassword = document.getElementById('inputPassword').value;
                const loading = document.getElementById('loading');
                loading.style.display = 'block';

                fetch('auth_user.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            inputAccount: inputAccount,
                            inputPassword: inputPassword
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.c === true) {
                            alert(data.m);
                            window.location.href = "<?php echo $sPath; ?>";
                        } else {
                            alert(data.m);
                        }
                    })
                    .catch(error => {
                        alert('cant access, db is down');
                    })
                    .finally(() => {
                        loading.style.display = 'none';
                    });
            });
        });
    </script> -->



    <div id="loading" name="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,0.5);z-index:9999;">
        <i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute;top:50%;left:50%;"></i>
    </div>
       
</body>

</html>

<?php
function activeShow($num, $chkPoint)
{
    return (($num == $chkPoint) ? 'active' : '');
}
?>