<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8');

require_once('../connections/conn_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $_SESSION['id'];
    $addressid = $input['addressid'];
    $note = $input['note'];
    $ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('Asia/Taipei');
    $orderid = date('Ymdhis').rand(100,999);
    
    $SQLstring_address = sprintf("SELECT * from addbook WHERE addressid=%d", $addressid);
    $address_data = $link->query($SQLstring_address);
    $data = $address_data->fetch();
    $cname = $data['cname'];
    $phone = $data['phone'];
    $address = $data['address'];
    
        

    $SQLstring = sprintf("INSERT INTO uorder (orderid, user_id, cname, phone, address, payment_method, payment_status, status, remark) VALUES ('%s', %d, '%s', '%s', '%s', 3, 35, 7, '%s')", $orderid, $id, $cname, $phone, $address, $note );
    $addorder = $link->query($SQLstring);
    if ($addorder) {
        $SQLstring_cart = sprintf("UPDATE cart SET orderid=%d, user_id=%d, status=8 WHERE ip='%s' AND orderid IS NULL", $orderid, $id, $ip);
        $update_cart = $link->query($SQLstring_cart);
        $data = array(
            'success' => true,
            'message' => 'Checkout Compeleted'
        );
    } else {
        $data = array(
            'success' => false,
            'message' => 'Checkout Failed'
        );
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>