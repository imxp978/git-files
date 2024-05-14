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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="reg.php";
  $loginUsername = $_POST['C_Username'];
  $LoginRS__query = sprintf("SELECT C_Username FROM customer WHERE C_Username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_cart1, $cart1);
  $LoginRS=mysql_query($LoginRS__query, $cart1) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO customer (C_Username, C_Password, C_Name, C_Addr, C_Phone, C_Email) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['C_Username'], "text"),
                       GetSQLValueString($_POST['C_Password'], "text"),
                       GetSQLValueString($_POST['C_Name'], "text"),
                       GetSQLValueString($_POST['C_Addr'], "text"),
                       GetSQLValueString($_POST['C_Phone'], "text"),
                       GetSQLValueString($_POST['C_Email'], "text"));

  mysql_select_db($database_cart1, $cart1);
  $Result1 = mysql_query($insertSQL, $cart1) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
      <td>瀏覽商品</td>
      <td>檢視購物車</td>
      <td>清空購物車</td>
    </tr>
  </table>
  
</div>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center">
    <table width="409" border="1
  ">
      <tr align="center" style="background-color: #F99;">
        <td colspan="2">註冊
        <label for="C_Username"></label></td>
      </tr>
      <tr>
        <td width="124">登入名稱</td>
        <td width="269"><input type="text" name="C_Username" id="C_Username" /></td>
      </tr>
      <tr>
        <td>密碼</td>
        <td><input type="text" name="C_Password" id="C_Password" /></td>
      </tr>
      <tr>
        <td>信箱</td>
        <td><input type="text" name="C_Email" id="C_Email" /></td>
      </tr>
      <tr>
        <td>姓名</td>
        <td><input type="text" name="C_Name" id="C_Name" /></td>
      </tr>
      <tr>
        <td>電話</td>
        <td><input type="text" name="C_Phone" id="C_Phone" /></td>
      </tr>
      <tr>
        <td>住址</td>
        <td><input type="text" name="C_Addr" id="C_Addr" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="login.php">登入</a>          <input type="submit" name="button" id="button" value="送出" /></td>
      </tr>
    </table>
  </div>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p align="center">&nbsp;</p>
</body>
</html>