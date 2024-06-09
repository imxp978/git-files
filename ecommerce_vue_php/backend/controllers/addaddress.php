<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

require_once('../connections/conn_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $input = json_decode(file_get_contents('php://input'), true);
    $name = $input['name'];
    $address = $input['address'];
    $phone = $input['phone'];

    if ($name && $address && $phone) {
        $SQLstring_reset = sprintf("UPDATE addbook SET setdefault=0 WHERE user_id=%d AND setdefault=1", $id);
        $resetaddress = $link->query($SQLstring_reset);
        $SQLstring = sprintf("INSERT INTO addbook (setdefault, user_id, cname, phone, address) VALUES (1, %d, '%s', '%s', '%s')", $id, $name, $phone, $address);
        $addresss = $link->query($SQLstring);
        $data = array(
            'success' => true,
            'message' => 'Address Added'
        );
    } else {
        $data = array(
            'success' => false,
            'message' => 'Please Insert Name, Phone, and Address'
        );
    }
} else {
    $data = array(
        'success' => false,
        'message' => 'DB Down'
    );
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
