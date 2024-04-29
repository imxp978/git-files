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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "fHtmlEditor")) {
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
        selector: '#Content'
      });
    </script>
</head>

<body>
<div align="center">
  <h3>討論區 </h3>
</div>
<hr />

<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><form action="<?php echo $editFormAction; ?>" id="fHtmlEditor" name="fHtmlEditor" method="POST">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>暱稱：
            <input name="Nickname" type="text" id="Nickname" value="訪客" />
            　　E-Mail：
            <input name="Email" type="text" id="Email" /></td>
          </tr>
          <tr>
            <td><p>主題：
              <input name="Title" type="text" id="Title" size="75" />
            </p>            </td>
          </tr>
        </table>
        <div align="center">
          <p>
            <label for="Content"></label>
            <textarea name="Content" id="Content" cols="45" rows="5"></textarea>
  </p>
          <p>
            <input type="submit" name="Submit" value="送出" />
          </p>
		</div>
        <input type="hidden" name="MM_insert" value="fHtmlEditor" />
    </form>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
