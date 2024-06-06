<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

require_once('connections/conn_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $email = $input['email'];
    $password = md5($input['password']);

    if (!($email && $password)) {
        $data = array(
            'success' => false,
            'message' => 'Insert Email and Password'
        );
    } else {
        $SQLstring = sprintf("SELECT * FROM member WHERE email = '%s' AND pw1 = '%s'", $email, $password);
        $members = $link->query($SQLstring);
        if ($members->rowCount()) {
            $result = $members->fetch();
            if ($result['active']) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $result['user_id'];
                $_SESSION['email'] = $result['email'];
                $data = array(
                    'success' => true,
                    'email' => $result['email'],
                    'message' => 'Login Successful'
                );
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'Account Is Not Active'
                );
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'Invalid Email or Password'
            );
        };
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
