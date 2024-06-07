<!-- 資料庫連線程式載入 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入PHP函數庫 -->
<?php require_once("php_lib.php");

//檢查是否登入 若無則導向login.php
if (!isset($_SESSION['login'])) {
    $sPath = "login.php?sPath=checkout";
    header(sprintf('Location:%s', $sPath));
}
?>

<?php
function activeShow($num, $chkPoint)
{
    return (($num == $chkPoint) ? 'active' : '');
}
?>

<!doctype html>
<html lang="zh-TW">

<head>
    <?php require_once('headfile.php'); ?>
    <style>
        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-bottom: none;
            border-top: 1px solid #dee2e6;
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
                    <!-- 引入結帳模組 -->
                    <?php require_once("chkout_content.php"); ?>
                </div>
    </section>
    <section id="scontent">
        <?php require_once('scontent.php'); ?>
    </section>
    <section id="footer">
        <?php require_once('footer.php'); ?>
    </section>
    <?php require_once('jsfile.php'); ?>

    <script>
        // 城市選擇

        // 取得縣市後將鄉鎮名放入#myTown
        $("#myCity").change(function() {
            let CNo = $("#myCity").val();
            if (CNo == "") {
                return false
            };
            $.ajax({
                url: 'Town_ajax.php',
                type: 'post',
                dataType: 'json',
                data: {
                    CNo: CNo,
                },
                success: function(data) {
                    if (data.c == true) {
                        $("#myTown").html(data.m);
                    } else {
                        alert('DB response error: ' + data.m);
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接後台資料庫");
                }
            });
        });
        // 選擇程式後 查詢郵遞區號放入#myzip #add_label
        $("#myTown").change(function() {
            let AutoNo = $("#myTown").val();
            if (AutoNo == "") {
                $('#myzip').val('');
                $('#add_label').html('');
                return false;
            }
            $.ajax({
                url: 'Zip_ajax.php',
                type: 'get',
                dataType: 'json',
                data: {
                    AutoNo: AutoNo
                },
                success: function(data) {
                    if (data.c == true) {
                        $("#myzip").val(data.Post);
                        $("#add_label").html('郵遞區號:' + data.Post + data.Cityname + data.Name);
                    } else {
                        alert('DB response error' + data.m);
                    }
                },
                error: function(data) {
                    alert("ajax request error 系統目前無法連接後台資料庫");
                }
            });
        });
    </script>



    <script>
        // 取得元素ID
        function getId(el) {
            return document.getElementById(el);
        }
    </script>

    <div id="loading" name="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,0.5);z-index:9999;">
        <i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute;top:50%;left:50%;"></i>
    </div>
</body>

</html>