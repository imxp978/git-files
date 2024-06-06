<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php require_once('connections/conn_db.php'); ?>
<?php
if (isset($_GET['mode']) && $_GET['mode'] != '') {
    $mode = $_GET['mode'];
    switch ($mode) {
        case 1:
            //使用購物車編號刪除項目
            $SQLstring = sprintf("DELETE FROM addbook WHERE addressid=%d AND user_id=%d", $_GET['addressid'], $_SESSION['id']);
            break;
    }
    $result = $link->query($SQLstring);
}
$deleteGoto = "shipping.php";
header(sprintf("location:%s", $deleteGoto));
?>