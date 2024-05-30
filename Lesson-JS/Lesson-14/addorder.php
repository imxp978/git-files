<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8');

require_once('Connections/conn_db.php');
(!isset($_SESSION)) ? session_start() : '';
if (isset($_SESSION['emailid']) && $_SESSION['emailid'] != '') {
    $emailid = $_SESSION['emailid'];
    $addressid = $_POST['addressid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $orderid = date('Ymdhis') . rand(10000, 99999); //產生時間與訂單編號
    $query = sprintf("INSERT INTO uorder (orderid, emailid, addressid, howpay, paystatus, status) 
        VALUES ('%s', '%d', '%d', '3', '35', '7');", $orderid, $emailid, $addressid);
    $result = $link->query($query);
    if ($result) {
        $query = sprintf("UPDATE cart SET orderid = '%d', emailid='%d', status = '8' WHERE ip = '%s' AND orderid IS NULL;", $orderid, $emailid, $ip);
        $result = $link->query($query);
        $retcode = array('c' => '1', 'm' => '已完成結帳');
    } else {
        $retcode = array('c' => '0', 'm' => '無法寫入資料庫');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
