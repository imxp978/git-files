<?php require_once('Connections/stud.php'); ?>
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
$title = array("姓名", "學號", "性別", "生日", "學校", "科系", "電話", "地址", "照片",);
$array = array("stud_name", "stud_idno", "stud_gender", "stud_birthday", "stud_school", "stud_major", "stud_phone", "stud_address", "stud_photo");

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO stud (stud_name, stud_idno, stud_gender, stud_birthday, stud_school, stud_major, stud_phone, stud_address, stud_photo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",  
  GetSQLValueString($_POST['stud_name'], "text"),
  GetSQLValueString($_POST['stud_idno'], "text"),
  GetSQLValueString($_POST['stud_gender'], "text"),
  GetSQLValueString($_POST['stud_birthday'], "date"),
  GetSQLValueString($_POST['stud_school'], "text"),
  GetSQLValueString($_POST['stud_major'], "text"),
  GetSQLValueString($_POST['stud_phone'], "text"),
  GetSQLValueString($_POST['stud_address'], "text"),
    GetSQLValueString($_POST['stud_photo'], "text")
  );
                       

  mysql_select_db($database_stud, $stud);
  $Result1 = mysql_query($insertSQL, $stud) or die(mysql_error());

  $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
};

mysql_select_db($database_stud, $stud);
$query_Recordset1 = "SELECT * FROM stud";
$Recordset1 = mysql_query($query_Recordset1, $stud) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>

<style>
	#wrap {
		width: 65%;
		background-color: rgba(0,0,0,0.8);
		margin: 15% auto;
		text-align: center;
		font-size: 20px;
		font-family: sans-serif;
		color: white;
		line-height: 2em;
		padding: 20px;
		border-radius: 15px
		
		
		}
</style>
</head>

<body>
<div id="wrap">
<div id="inputs">
<form action="<?php echo $editFormAction; ?>" name="form1" method="POST">
<?php 
$title = array("姓名", "學號", "性別", "生日", "學校", "科系", "電話", "地址", "照片",);
$array = array("stud_name", "stud_idno", "stud_gender", "stud_birthday", "stud_school", "stud_major", "stud_phone", "stud_address", "stud_photo",);


	for ($i = 0; $i < 9; $i++) {
		echo (
		"<label for=$array[$i]>$title[$i]: </label><input name=$array[$i] id=$array[$i] type=\"text\" required placeholder=\"請輸入$title[$i]\"/><br>");
		}
		
?>
<input type="submit" value="新增"/>
<input type="reset" value="重置"/>
<input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
</div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
