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

$colname_Recordset1 = "-1";
if (isset($_GET['P_ID'])) {
  $colname_Recordset1 = $_GET['P_ID'];
}
mysql_select_db($database_cart_conn, $cart_conn);
$query_Recordset1 = sprintf("SELECT * FROM products WHERE P_ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $cart_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once('Connections/cart_conn.php'); ?>
<title>無標題文件</title>
</head>

<body>
<h1>購物車</h1>
<table>
<tr>
<td>瀏覽商品 <a href="showcart.php">檢視購物車</a> 清空購物車</td>
</tr>
</table>

<form action="addtocart.php" method="post" name="form1" id="form1">
    <table border="1">
        <tr>
          <td>名稱:</td>
          <td><?php echo $row_Recordset1['P_Name']; ?><input name="P_Name" type="hidden" id="P_Name" value="<?php echo $row_Recordset1['P_Name']; ?>" /></td></tr>
        <tr>
          <td>簡介:</td>
          <td><?php echo $row_Recordset1['P_Introduce']; ?></td></tr>
        <tr>
          <td>特價:</td>
          <td><?php echo $row_Recordset1['P_Price']; ?><input name="P_Price" type="hidden" id="P_Price" value="<?php echo $row_Recordset1['P_Price']; ?>" /></td>
     </tr>
        <tr>
         <td>狀態:</td><td><?php echo $row_Recordset1['P_State']; ?></td></tr>
        <tr>
      <td colspan="2" align="right"><input name="P_ID" type="hidden" id="P_ID" value="<?php echo $row_Recordset1['P_ID']; ?>" /><button type="submit">加入購物車</button></td></tr>
    </table>
</form>



</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
