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
$query_Recordset1 = "SELECT * FROM orders ORDER BY O_OID DESC";
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
<tr><td>柳覽商品</td><td>檢視購物車</td><td>清空購物車</td></tr>
</table>

<table border="1">
<tr>
<td>訂單編號</td><td>訂購者</td><td>日期</td><td>金額</td><td>狀態</td>
</tr>
<?php do { ?>
  <tr>
    <td><a href="orderdetail.php?OID=<?php echo $row_Recordset1['O_OID']; ?>"><?php echo $row_Recordset1['O_OID']; ?></a></td>
    <td><?php echo $row_Recordset1['O_CName']; ?></td>
    <td><?php echo $row_Recordset1['O_Date']; ?></td><td><?php echo $row_Recordset1['O_Total']; ?></td><td><?php echo $row_Recordset1['O_State']; ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
