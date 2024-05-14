<?php require_once('Connections/cart1.php'); ?>
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
mysql_select_db($database_cart1, $cart1);
$query_Recordset1 = sprintf("SELECT * FROM products WHERE P_ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $cart1) or die(mysql_error());
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
<h2 align="center">購物車</h2>
<hr>
<div align="center">
  <table width="500" border="0" align="center">
    <tr align="center">
      <td><a href="index.php">瀏覽商品</a></td>
      <td>檢視購物車</td>
      <td>清空購物車</td>
 
    </tr>
  </table>
</div>
<br>

<form id="form1" name="form1" method="post" action="addtocart.php">
<table width="700" border="1" align="center">
  <tr>
    <td width="77" bgcolor="#FFCC99">名稱：</td>
    <td width="607"><?php echo $row_Recordset1['P_Name']; ?>
      <input name="P_Name" type="hidden" id="P_Name" value="<?php echo $row_Recordset1['P_Name']; ?>" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC99">簡介：</td>
    <td><?php echo $row_Recordset1['P_Introduce']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC99">特價：</td>
    <td><?php echo $row_Recordset1['P_Price']; ?>
      <input name="P_Price" type="hidden" id="P_Price" value="<?php echo $row_Recordset1['P_Price']; ?>" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC99">狀態：</td>
    <td><?php echo $row_Recordset1['P_State']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input name="P_ID" type="hidden" id="P_ID" value="<?php echo $row_Recordset1['P_ID']; ?>" />
      <input type="submit" name="button" id="button" value="加入購物車" /></td>
    </tr>
</table>
</form>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
