<?php require_once('Connections/forum.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO topic (Title, Content, Nickname, Email) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Content'], "text"),
                       GetSQLValueString($_POST['Nickname'], "text"),
                       GetSQLValueString($_POST['Email'], "text"));

  mysql_select_db($database_forum, $forum);
  $Result1 = mysql_query($insertSQL, $forum) or die(mysql_error());

  $insertGoTo = "index.php";
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
	<script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
<style>
	.input {
		background-color: lightgray;
		border: 1px dotted black;
		border-radius: 15px;
		padding: 20px;
		line-height: 2em;
}
</style>
</head>

<body>
<h1 align="center">討論區</h1>
<p>&nbsp;</p>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"><a href="index.php">回首頁</a></th>
  </tr>
</table>
<p>&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table class="input" width="800" align="center" cellpadding="0" cellspacing="0">
    <tr>
    	<th align="left" ></th>
    </tr>
    <tr>
      <td align="left" scope="col">暱稱:
        <label for="Nickname"></label>
      <input type="text" name="Nickname" id="Nickname" /></td>

    </tr>
    <tr>
    	<td align="left" scope="col">Email:
        <label for="Email"></label>
      	<input type="email" name="Email" id="Email" /></td>
    </tr>
    <tr>
     	<td colspan="2" align="left">主題:
        <label for="Title"></label>
     	<input type="text" name="Title" id="Title" /></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><label for="Content"></label>
      <textarea name="Content" id="mytextarea" cols="30" rows="30"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>