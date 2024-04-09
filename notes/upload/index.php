<?php require_once('Connections/uploadConn.php'); ?>
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

mysql_select_db($database_uploadConn, $uploadConn);
$query_Recordset1 = "SELECT * FROM upload ORDER BY ID DESC";
$Recordset1 = mysql_query($query_Recordset1, $uploadConn) or die(mysql_error());
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
<h1 align="center">檔案上傳系統</h1>
<p>&nbsp;</p>
<table align="center" width="65%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col"><a href="upload.php">新增檔案</a></th>
  </tr>
</table>
<p>&nbsp;</p>
<table align="center" width="65%" border="1" cellspacing="0" cellpadding="0">
  <?php do { ?>
    <tr>
      <td scope="col"><p>名稱:</p></td>
      <td scope="col"><b><?php echo $row_Recordset1['UserFilename']; ?></b></td>
      <td scope="col">大小:</td>
      <td scope="col"><?php echo $row_Recordset1['Size']; ?> Byte</td>
      <td scope="col"><a href="download.php?UserFilename=<?php echo $row_Recordset1['UserFilename']; ?>&amp;ServerFilename=<?php echo $row_Recordset1['ServerFilename']; ?>">下載</a> <a href="del.php?ID=<?php echo $row_Recordset1['ID']; ?>" class="del">刪除</a></td>
    </tr>
    <tr>
      <td>說明:</td>
      <td colspan="4"><?php echo $row_Recordset1['Comment']; ?></td>
      
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<script>
const del = document.querySelectorAll('.del');

del.forEach( function(element) {
	element.onclick = function() {
		if(confirm('Really?') ) {
		} else {
			return false;	
		}
		}
	});
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

