<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

require_once('connections/conn_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $input = json_decode(file_get_contents('php://input'), true);
    $addressid = $input['addressid'];
    $SQLstring_reset = sprintf("UPDATE addbook SET setdefault=0 WHERE user_id = %d AND setdefault=1", $id);
    $add_reset = $link->query($SQLstring_reset);
    $SQLstring = sprintf("UPDATE addbook SET setdefault=1 WHERE user_id = %d AND addressid=%d", $id, $addressid);
    $add_update = $link->query($SQLstring);

    if($add_update) {
        $data = array(
            'success' => true,
            'message' => 'Default Address Updated'
        );
    } else {
        $data = array(
            'success' => false,
            'message' => 'Default Address Update Failed'
        );
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
