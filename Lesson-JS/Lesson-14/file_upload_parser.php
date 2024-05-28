<?php 

$fileName = $_FILES['file1']['name'];
$fileTmpLoc = $_FILES['file1']['tmp_name'];
$fileType = $_FILES['file1']['type'];
$fileSize = $_FILES['file1']['size'];
$fileErrorMsg = $_FILES['file1']['error'];

if (!$fileTmpLoc) {
    $retcode = array('success' => 'false', 'msg'=>'', 'error'=>'上船站存檔無法建立', 'fileName'=> '');
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    exit();
}
if (move_uploaded_file($fileTmpLoc, "uploads/$fileName")) {
    //file to uploads folder
    $retcode = array('success'=>'true', 'msg'=>'file uploaded', 'error'=>'', 'fileName'=>$fileName);
} else {
    $retcode = array('success'=>'false', 'msg'=>'', 'error'=>'無法完成檔案上傳','fileName'=>'');
} echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
exit();



?>