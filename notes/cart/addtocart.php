<?php 
	session_start();
	if(isset($_SESSION['Cart'])) {
		if(in_array($_POST['P_ID'],$_SESSION['Cart'])) {
			header ('Content-type: text/html; charset=utf-8');
			die("<a href=javascript:history.back(-1)>商品已在購物車內</a>");
		}
	}
	$_SESSION['Cart'][]=$_POST['P_ID']; 
	$_SESSION['Name'][]=$_POST['P_Name'];
	$_SESSION['Price'][]=$_POST['P_Price'];
	$_SESSION['Quantity'][] =1;
	header("Location:showcart.php");

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