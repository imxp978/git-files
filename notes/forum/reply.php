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
  $insertSQL = sprintf("INSERT INTO reply (Reply_TopicID, Content, Nickname, Email) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['TopicID'], "int"),
                       GetSQLValueString($_POST['textarea'], "text"),
                       GetSQLValueString($_POST['reply_nickname'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_forum, $forum);
  $Result1 = mysql_query($insertSQL, $forum) or die(mysql_error());

  $insertGoTo = "topic.php?TopicID=" . $row_Recordset1['TopicID'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset1 = $_GET['TopicID'];
}
mysql_select_db($database_forum, $forum);
$query_Recordset1 = sprintf("SELECT * FROM topic WHERE TopicID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $forum) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
*{
	border: 1px dotted black;
}
</style>
</head>

<body>
<div class="container" align="center">
  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>"><table width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th align="left" scope="col">
          <label for="reply_nickname"></label>
          暱稱:
          <input type="text" name="reply_nickname" id="reply_nickname" /> 
          email: 
          <label for="email"></label>
          <input type="text" name="email" id="email" />
</th>
    </tr>
    <tr>
      <td><label for="textarea"></label>
        <textarea name="textarea" id="mytextarea" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="送出" /></td>
    </tr>
  </table>
   <input type="hidden" name="TopicID" value="<?php echo $row_Recordset1['TopicID']; ?>" />
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
