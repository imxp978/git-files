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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  
  
 foreach($_POST['D_PName'] as $i => $val){
  $insertSQL = sprintf("INSERT INTO orderdetail (D_OID, D_PName, D_PPrice, D_PQuantity, D_ItemTotal) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['D_OID'], "text"),
                       GetSQLValueString($_POST['D_PName'][$i], "text"),
                       GetSQLValueString($_POST['D_PPrice'][$i], "int"),
                       GetSQLValueString($_POST['D_PQuantity'][$i], "int"),
                       GetSQLValueString($_POST['D_ItemTotal'][$i], "int"));


  mysql_select_db($database_cart1, $cart1);
  $Result1 = mysql_query($insertSQL, $cart1) or die(mysql_error());

 } //foreach($_POST['D_PName'] as $i => $val)
  $insertGoTo = "purchase.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

session_start();
if(!isset($_SESSION['O_ID']))
 $_SESSION['O_ID']=date("YmdHis").substr(md5(uniqid(rand())),0,10);
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
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="700" border="1" align="center">
    <tr align="center">
    <td colspan="5" align="left">訂單編號：
      <input name="D_OID" type="hidden" id="D_OID" value="<?php echo $_SESSION['O_ID']; ?>" />
      <?php echo $_SESSION['O_ID']; ?></td>
    <tr>
    </tr>
      <td align="center" bgcolor="#FFCC99">商品編號</td>
      <td align="center" bgcolor="#FFCC99">商品名稱</td>
      <td align="center" bgcolor="#FFCC99">單價</td>
      <td align="center" bgcolor="#FFCC99">數量</td>
      <td align="center" bgcolor="#FFCC99">小計</td>
    </tr>
    <tr>
    <?php foreach($_SESSION['Cart'] as $i => $val) { ?>
      <td align="center"><?php echo $_SESSION['Cart'][$i]; ?></td>
      <td align="center"><?php echo $_SESSION['Name'][$i]; ?>        
      <input name="D_PName[]" type="hidden" id="D_PName[]" value="<?php echo $_SESSION['Name'][$i]; ?>" /></td>
      <td align="center"><?php echo $_SESSION['Price'][$i]; ?>        
      <input type="hidden" name="D_PPrice[]" id="D_PPrice[]" value="<?php echo $_SESSION['Price'][$i]; ?>" /></td>
      <td align="center"><?php echo $_SESSION['Quantity'][$i]; ?>        
      <input type="hidden" name="D_PQuantity[]" id="D_PQuantity[]" value="<?php echo $_SESSION['Quantity'][$i]; ?>" /></td>
      <td align="center"><?php echo $_SESSION['itemTotal'][$i]; ?>        
      <input type="hidden" name="D_ItemTotal[]" id="D_ItemTotal[]" value="<?php echo $_SESSION['itemTotal'][$i]; ?>" /></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="5" align="right">總金額：<?php echo $_SESSION['Total']; ?></td>
    </tr>
    <tr>
      <td colspan="5" align="right"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>