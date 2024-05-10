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

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_stud, $stud);
$query_Recordset1 = sprintf("SELECT * FROM stud WHERE stud_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $stud) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE stud SET stud_name=%s, stud_idno=%s, stud_gender=%s, stud_birthday=%s, stud_school=%s, stud_major=%s, stud_phone=%s, stud_address=%s, stud_photo=%s WHERE stud_id=%s",
                       GetSQLValueString($_POST['stud_name'], "text"),
                       GetSQLValueString($_POST['stud_idno'], "text"),
                       GetSQLValueString($_POST['stud_gender'], "text"),
                       GetSQLValueString($_POST['stud_birthday'], "date"),
                       GetSQLValueString($_POST['stud_school'], "text"),
                       GetSQLValueString($_POST['stud_major'], "text"),
                       GetSQLValueString($_POST['stud_phone'], "int"),
                       GetSQLValueString($_POST['stud_address'], "text"),
                       GetSQLValueString($_POST['stud_photo'], "text"),
                       GetSQLValueString($_POST['stud_id'], "int"));

  mysql_select_db($database_stud, $stud);
  $Result1 = mysql_query($updateSQL, $stud) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
?>
<form action="<?php echo $editFormAction; ?>" name="form1" method="POST">

    <input type="hidden" name="stud_id" value="<?php echo $row_Recordset1['stud_id'];  ?>" /><br />
    姓名<input type="text" name="stud_name" value="<?php echo $row_Recordset1['stud_name'];  ?>" /><br />
    學號<input type="text" name="stud_idno" value="<?php echo $row_Recordset1['stud_idno'];  ?>" /><br />
    性別<input type="text" name="stud_gender" value="<?php echo $row_Recordset1['stud_gender'];  ?>" /><br />
    生日<input type="text" name="stud_birthday" value="<?php echo $row_Recordset1['stud_birthday'];  ?>" /><br />
    學校<input type="text" name="stud_school" value="<?php echo $row_Recordset1['stud_school'];  ?>" /><br />
    科系<input type="text" name="stud_major" value="<?php echo $row_Recordset1['stud_major'];  ?>" /><br />
    電話<input type="text" name="stud_phone" value="<?php echo $row_Recordset1['stud_phone'];  ?>" /><br />
    地址<input type="text" name="stud_address" value="<?php echo $row_Recordset1['stud_address'];  ?>" /><br />
    照片<input type="text" name="stud_photo" value="<?php echo $row_Recordset1['stud_photo'];  ?>" /><br />
		

<input type="submit" value="新增"/>
<input type="reset" value="重置"/>
<input type="hidden" name="MM_update" value="form1" />

</form>
</div>
</div>


</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
