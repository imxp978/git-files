<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

require_once('./connections/conn_db.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $p_id = $input['p_id'];
    $quantity = (int)$input['quantity'];
    $ip = $_SERVER['REMOTE_ADDR'];


    if ($p_id && $quantity > 0) {
        $SQLstring_cart = sprintf("SELECT * From cart WHERE ip = '%s' AND p_id = %d AND orderid IS NULL", $ip, $p_id);
        $check_cart = $link->query($SQLstring_cart);
        $SQLstring_product = sprintf("SELECT * From product WHERE p_id = %d", $p_id);
        $check_product = $link->query($SQLstring_product);
        $product = $check_product->fetch();

        if ($check_cart->rowCount()) {
            $data_cart = $check_cart->fetch();
            $quantity_cart = (int)$data_cart['qty'];
            if ($quantity + $quantity_cart > $product['p_qty']) {
                $data = array(
                    'success' => false,
                    'message' => 'Not Enough Quantity'
                );
            } else {
                $SQLstring = sprintf("UPDATE cart SET qty=%d WHERE p_id=%d", $quantity + $quantity_cart, $p_id);
                $update_quantity = $link->query($SQLstring);
                $data = array(
                    'success' => true,
                    'message' => 'Quantity Updated'
                );
            }
        } else {
            if ($quantity > $product['p_qty']){
                $data = array(
                    'success' => false,
                    'message' => 'Not Enough Quantity'
                );
            } else {
                $SQLstring = sprintf("INSERT INTO cart (p_id, qty, ip) VALUES ('%s', %d, '%s')", $p_id, $quantity, $ip);
                $add = $link->query($SQLstring);
                $data = array(
                    'success' => true,
                    'message' => 'Item Added'
                );
            }
        }
    } else {
        $data = array(
            'success' => false,
            'message' => 'At Least 1'
        );
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
