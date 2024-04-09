<?php 
	$Filename="files/".$_GET['ServerFilename'];  //設定路徑
	if(!file_exists($Filename)){
		header ('Content-type: text/html; charset=utf-8');
		die("檔案不存在");
	}
		
	header('Content-type: application/force-download');
	header('Content-Transfer-Encoding: Binary');
	header("Content-Disposition: attachment; filename=".$_GET['UserFilename']); //設定下載檔名
	readfile($Filename);  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>