<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

require_once('connections/conn_db.php');

if (session_status() === PHP_SESSION_NONE) {session_start();}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $email = $input['email'];
    $password = md5($input['password']);

    if (!($email && $password)) {
        $data = array(
            'success' => false,
            'message' => 'Please Insert Email and Password'
        );
    } else {
        $SQLstring = sprintf("SELECT * FROM member WHERE email='%s'", $email);
        $accountCheck = $link->query($SQLstring);
        if ($accountCheck->rowCount()) {
            $data = array(
                'success' => false,
                'message' => 'This Email Has Already Been Registered'
            );
        } else {
            $SQLstring = sprintf("INSERT INTO member (email, pw1) VALUES ('%s', '%s')", $email, $password);
            $signup = $link->query($SQLstring);
            if ($signup) {
                $data = array(
                    'success' => true,
                    'message' => 'Sign Up Successful'
                );
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $link->lastInsertId();
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'Sign Up Failed, Contact Customer Service'
                );
            }

        }
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}



?>