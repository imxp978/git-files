<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8');

require_once('Connections/conn_db.php');
(!isset($_SESSION)) ? session_start() : '';

if (isset($_SESSION['emailid']) && $_SESSION['emailid'] != '') {
    $emailid = $_SESSION['emailid'];
    $addressid = $_POST['addressid'];

    // 將預設收件人取消
    $query = sprintf("UPDATE addbook SET setdefault = '0' WHERE emailid='%d' AND setdefault='1';", $emailid);
    $result = $link->query($query);
    // 將選定收件人設定為預設收件人
    $query = sprintf("UPDATE addbook SET setdefault = '1' WHERE addressid = '%d';", $addressid);
    $result = $link->query($query);

    if ($result) {
        $retcode = array('c' => '1', 'm' => '收件人以變更');
    } else {
        $retcode = array('c' => '0', 'm' => '無法寫入資料庫');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
