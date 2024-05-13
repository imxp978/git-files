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

mysql_select_db($database_cart_conn, $cart_conn);
$query_Recordset1 = "SELECT * FROM products ORDER BY P_ID DESC";
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

<h1>購物車</h1>
<table >
<tr><td>瀏覽商品 檢視購物車 清空購物車 <a href="reg.php">註冊</a> <a href="login.php">登入</a></td></tr>
</table>

<table border="1">
<tr>
<td>商品名稱</td>
<td>特價</td>
</tr>
<?php do { ?>
  <tr>
    <td><a href="product.php?P_ID=<?php echo $row_Recordset1['P_ID'] ?>"><?php echo $row_Recordset1['P_Name']; ?></a></td>
    <td><?php echo $row_Recordset1['P_Price']; ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
