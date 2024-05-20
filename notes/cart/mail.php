<?php require_once('Connections/cart_conn.php'); ?>
<?php 
session_start();

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['O_ID'])) {
  $colname_Recordset1 = $_SESSION['O_ID'];
}
mysql_select_db($database_cart_conn, $cart_conn);
$query_Recordset1 = sprintf("SELECT * FROM orders WHERE O_OID = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $cart_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//EMAIL

include("PHPMailerAutoload.php"); //頁面開頭請先匯入PHPMailer類別
$Body=$row_Recordset1['O_CName'] . "你好!<br>"
  ."歡迎你在***購物，以下是你的訂購單<br><br>"
  ."訂單編號：" . $row_Recordset1['O_OID'] . "　日期：" 
  . $row_Recordset1['O_Date'] ."<br>"
  ."======================================================" . "<br>"
  ."聯絡電話：" . $row_Recordset1['O_CPhone'] . "<br>"
  ."收件地址：" . $row_Recordset1['O_CAddr'] . "<br>"
  ."付款方式：匯款/ATM轉帳 銀行代碼123 帳號4567891235" . "<br>"
  ."======================================================" . "<br><br>"
  ."付款後請電洽客服中心或傳真單據至 (02) 0809449 ";
			
$Sendto=$row_Recordset1 ['O_CEmail'];
$mail= new PHPMailer(); //建立新物件
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8"; //郵件編碼
$mail->Username = "quelquefoi@gmail.com"; //Gamil帳號
$mail->Password = "fmhh rcwa wnus bysj"; //Gmail密碼
 
$mail->From = "TEST@gmail.com"; //寄件者信箱
$mail->FromName = "你的餅YOU"; //寄件者姓名
 
$mail->Subject ="【4℃購物網】購物通知";  //郵件標題
$mail->Body = $Body; //郵件內容
 
$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress($Sendto); //收件者郵件及名稱
 
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
} else {
	echo "成功寄出";
	}




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
<?php
mysql_free_result($Recordset1);
unset($_SESSION['O_ID']);
unset($_SESSION['Cart']);
unset($_SESSION['Name']);
unset($_SESSION['Price']);
unset($_SESSION['Quantity']);
header('Location:index.php');
?>
