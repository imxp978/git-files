<?php
header('Access-Control-Allow-Origin:*');
header('conten-type:application/json; charset=utf8');

require_once('connections/conn_db.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['inputAccount']) && isset($_POST['inputPassword'])) {
    $inputAccount = $_POST['inputAccount'];
    $inputPassword = $_POST['inputPassword'];
    $query = "SELECT * FROM member WHERE email='$inputAccount' AND pw1='$inputPassword'";
    // $query = "SELECT * FROM member WHERE email='test@example.com' AND pw1='123456'";
    // $query = sprintf("SELECT * FROM member WHERE email='%s' AND pw1='%s'", $inputAccount, $inputPassword);
    // echo $query;
    $check = $link->query($query);


    if ($check) {
        if ($check->rowCount() == 1) {
            $data = $check->fetch();
            if ($data['active']==1) {
                $_SESSION['login']=true;
                $_SESSION['id']=$data['id'];
                $_SESSION['email']=$data['email'];
                $_SESSION['cname']=$data['cname'];
                $retcode = array('c'=>'1', 'm'=>'Logged In');
            } else {
                $retcode = array("c"=>'2', 'm'=>'Account Locked, Contact Customer Service');
            }
        } else {
            $retcode = array('c'=>'0', 'm'=>'Error, Username Not Exist or Wrong Password');
        }
    } else {
        $retcode = array('c'=>'0', 'm'=>'Error, DB down');
        echo 'check';
   }
   echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
} 
return;

?>