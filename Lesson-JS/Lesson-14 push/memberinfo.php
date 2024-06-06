<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json;charset=utf-8');

require_once('Connections/conn_db.php');

if(isset($_GET['emailid']) && $_GET['emailid']!='') {
    $emailid = $GET['emailid'];
    $query = sprintf("SELECT emailid, email, cname, tssn, birthday, imgname FROM member WHERE emailid=%d", $emailid);
    $result = $link->query($query);
    if($result) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        $retcode= array(
            "c"=>"1",
            "m"=>'',
            'd'=>$data
        );
    } else {
        $retcode = array(
            'c'=>'0',
            'm'=>'',
            'd'=>$data
        );
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
?>