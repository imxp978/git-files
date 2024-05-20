<?php require_once('Connections/cart_conn.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


//查詢 order
$query_order = sprintf("SELECT * FROM orders WHERE O_OID = %s", GetSQLValueString($colname_order, "text"));
$order = mysql_query($query_order, $cart_conn) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);

$colname_detail = "-1";
if (isset($_GET['OID'])) {
  $colname_detail = $_GET['OID'];
}
mysql_select_db($database_cart_conn, $cart_conn);
$query_detail = sprintf("SELECT * FROM orderdetail WHERE D_OID = %s", GetSQLValueString($colname_detail, "text"));
$detail = mysql_query($query_detail, $cart_conn) or die(mysql_error());
$row_detail = mysql_fetch_assoc($detail);
$totalRows_detail = mysql_num_rows($detail);

$colname_order = "-1";
if (isset($_GET['OID'])) {
  $colname_order = $_GET['OID'];
}
mysql_select_db($database_cart_conn, $cart_conn);
$query_order = sprintf("SELECT * FROM orders WHERE O_OID = %s", GetSQLValueString($colname_order, "text"));
$order = mysql_query($query_order, $cart_conn) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);

$colname_order_detail = "-1";
if (isset($_GET['OID'])) {
  $colname_order_detail = $_GET['OID'];
}
mysql_select_db($database_cart_conn, $cart_conn);
//查詢 order detail
$query_order_detail = sprintf("SELECT * FROM orderdetail WHERE D_OID = %s", GetSQLValueString($colname_order_detail, "text"));
$order_detail = mysql_query($query_order_detail, $cart_conn) or die(mysql_error());
$row_order_detail = mysql_fetch_assoc($order_detail);
$totalRows_order_detail = mysql_num_rows($order_detail);


//更新紀錄
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE orders SET O_State=%s WHERE O_ID=%s",
                       GetSQLValueString($_POST['O_state'], "text"),
                       GetSQLValueString($_POST['O_ID'], "int"));

  mysql_select_db($database_cart_conn, $cart_conn);
  $Result1 = mysql_query($updateSQL, $cart_conn) or die(mysql_error());

include("PHPMailerAutoload.php"); //頁面開頭請先匯入PHPMailer類別
$Body=$row_Recordset1['O_CName'] . "你好!<br>"
  ."歡迎你在***購物，以下是你的訂購單<br><br>"
  ."訂單編號：" . $row_order['O_OID'] . "　日期：" 
  . $row_order['O_Date'] ."<br>"
  ."======================================================" . "<br>"
  ."聯絡電話：" . $row_order['O_CPhone'] . "<br>"
  ."收件地址：" . $row_order['O_CAddr'] . "<br>"
  ."======================================================" . "<br><br>"
  ." 商品已出貨 感謝訂購!";
			
$Sendto=$row_order ['O_CEmail'];
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
 
$mail->Subject ="【4℃購物網】出貨通知";  //郵件標題
$mail->Body = $Body; //郵件內容
 
$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress($Sendto); //收件者郵件及名稱
 
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
} else {
	echo "成功寄出";
	}



  $updateGoTo = "orders.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_order = "-1";
if (isset($_GET['OID'])) {
  $colname_order = $_GET['OID'];
}
mysql_select_db($database_cart_conn, $cart_conn);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table><tr><td><a href="index.php">劉覽商品</a> | <a href="orders.php">檢視購物車 </a>| 清空購物車</td></tr>
</table>

<form action="<?php echo $editFormAction; ?>" name="form1" method="POST">
<table border="1">
<tr>
  <td colspan="4">訂單編號: <?php echo $row_order['O_OID']; ?>日期:<?php echo $row_order['O_Date']; ?></td></tr>
<tr><td>商品名稱</td><td>商品單價</td><td>商品數量</td><td>小計</td></tr>
<?php do { ?>
  <tr>
    <td><?php echo $row_detail['D_PName']; ?></td>
    <td><?php echo $row_detail['D_PPrice']; ?></td>
    <td><?php echo $row_detail['D_PQuantity']; ?></td>
    <td><?php echo $row_detail['D_ItemTotal']; ?></td>
  </tr>
  <?php } while ($row_detail = mysql_fetch_assoc($detail)); ?>
<tr><td></td><td></td><td></td><td>總計</td></tr>

<tr><td></td>
  <td>&nbsp;</td><td></td><td><?php echo $row_order['O_Total']; ?></td></tr>

<tr><td>顧客姓名</td><td><?php echo $row_order['O_CName']; ?></td><td></td><td></td></tr>
<tr><td>顧客電話</td><td><?php echo $row_order['O_CPhone']; ?></td><td></td><td></td></tr>
<tr><td>email</td><td><?php echo $row_order['O_CEmail']; ?></td><td></td><td></td></tr>
<tr><td>收件地址</td><td><?php echo $row_order['O_CAddr']; ?></td><td></td><td></td></tr>
<tr><td colspan="4">
<select name="O_state" size="1" id="O_state" >
    <option value="處理中" <?php if (!(strcmp("處理中", $row_order['O_State']))) {echo "selected=\"selected\"";} ?>>處理中 </option>
    <option value="已處理" <?php if (!(strcmp("已處理", $row_order['O_State']))) {echo "selected=\"selected\"";} ?>>已處理</option>
</select></td></tr>
<tr><td></td><td></td><td>&nbsp;</td><td><button type="submit">送出</button>
  <input name="O_ID" type="hidden" id="hiddenField" value="<?php echo $row_order['O_ID']; ?>" /></td></tr>
</table>
<input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($order);

mysql_free_result($detail);
?>
