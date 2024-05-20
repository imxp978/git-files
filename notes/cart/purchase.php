<?php require_once('Connections/cart_conn.php'); ?>
<?php  session_start(); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO orders (O_OID, O_CName, O_CAddr, O_CPhone, O_CEmail, O_Date, O_Total, O_State) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['O_OID'], "text"),
                       GetSQLValueString($_POST['O_CName'], "text"),
                       GetSQLValueString($_POST['O_CAddr'], "text"),
                       GetSQLValueString($_POST['O_CPhone'], "text"),
                       GetSQLValueString($_POST['O_CEmail'], "text"),
                       GetSQLValueString($_POST['O_Date'], "date"),
                       GetSQLValueString($_POST['O_Total'], "int"),
                       GetSQLValueString($_POST['O_State'], "text"));

  mysql_select_db($database_cart_conn, $cart_conn);
  $Result1 = mysql_query($insertSQL, $cart_conn) or die(mysql_error());

  $insertGoTo = "mail.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_cart_conn, $cart_conn);
$query_Recordset1 = sprintf("SELECT * FROM customer WHERE C_Username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $cart_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table>
	<tr><td><a href="index.php">瀏覽商品</a></td><td><a href="showcart.php">檢視購物車</a></td><td>清空購物車</td></tr>
</table>
<form method="POST" action="<?php echo $editFormAction; ?>" name="form">
<table>
    <tr><td>訂單編號</td><td><?php echo $_SESSION['O_ID']; ?></td></tr>
    <tr><td>姓名</td><td><input name="O_CName" type="text" value="<?php echo $row_Recordset1['C_Name']; ?>" /></td></tr>
    <tr><td>電話</td><td><input name="O_CPhone" type="text" value="<?php echo $row_Recordset1['C_Phone']; ?>" /></td></tr>
    <tr><td>Email</td><td><input name="O_CEmail" type="text" value="<?php echo $row_Recordset1['C_Email']; ?>" /></td></tr>
    <tr><td>地址</td><td><input name="O_CAddr" type="text" value="<?php echo $row_Recordset1['C_Addr']; ?>" /></td></tr>
    <tr>
      <td><input name="O_OID" type="hidden" id="hiddenField" value="<?php echo $_SESSION['O_ID']; ?>" />
      <input name="O_Date" type="hidden" id="hiddenField2" value="<?php echo date("Y:m:d H:i:s"); ?>" />
      <input name="O_Total" type="hidden" id="hiddenField3" value="<?php echo $_SESSION['Total']; ?>" />
      <input name="O_State" type="hidden" id="hiddenField4" value="處理中" /></td><td><button type="submit">送出</button></td></tr>
</table>
<p>
  <input type="hidden" name="MM_insert" value="form" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
