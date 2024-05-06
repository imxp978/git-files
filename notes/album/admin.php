<?php require_once('Connections/album_conn.php'); ?>
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

if ((isset($_POST['check_del'])) && ($_POST['check_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM album WHERE ID IN (%s)", 
  		implode(",", $_POST['check_del']));
        //GetSQLValueString($_POST['check_del'], "int"));

  mysql_select_db($database_album_conn, $album_conn);
  $Result1 = mysql_query($deleteSQL, $album_conn) or die(mysql_error());
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  
  // upload
  $countNum=count($_POST['ID']);
for($i=0; $i<$countNum; $i++){
  $updateSQL = sprintf("UPDATE album SET `Comment`=%s WHERE ID=%s",
                       GetSQLValueString($_POST['comment'][$i], "text"),
                       GetSQLValueString($_POST['ID'][$i], "int"));

  mysql_select_db($database_album_conn, $album_conn);
  $Result1 = mysql_query($updateSQL, $album_conn) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  }
}

mysql_select_db($database_album_conn, $album_conn);
$query_Recordset1 = "SELECT * FROM album ORDER BY ID DESC";
$Recordset1 = mysql_query($query_Recordset1, $album_conn) or die(mysql_error());
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

<h1>網路相簿 管理頁面</h1>
<p>&nbsp;</p>
<form method="POST" action="<?php echo $editFormAction; ?>" name="form1">
  <div align="center">
    <table >
      <tr>
        <?php
$Recordset1_endRow = 0;
$Recordset1_columns = 3; // number of columns
$Recordset1_hloopRow1 = 0; // first row flag
do {
    if($Recordset1_endRow == 0  && $Recordset1_hloopRow1++ != 0) echo "<tr>";
   ?>
        <td><table align="center" width="65%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="col"><img src="<?php echo $row_Recordset1['Name_thumb']; ?>" /></th>
            </tr>
          <tr>
            <td>刪除
              <input type="checkbox" name="check_del[]" id="check_del" value="<?php echo $row_Recordset1['ID']; ?>"/>
              <input type="hidden" name="ID[]" id="ID[]" value="<?php echo $row_Recordset1['ID']; ?> /></td>
            </tr>
          <tr>
            <td><label for="comment[]"></label><input type="text" name="comment[]" id="comment[]" value="<?php echo $row_Recordset1['Comment']; ?>" /></td>
            </tr>
        </table></td>
        <?php  $Recordset1_endRow++;
if($Recordset1_endRow >= $Recordset1_columns) {
  ?>
      </tr>
      <?php
 $Recordset1_endRow = 0;
  }
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
if($Recordset1_endRow != 0) {
while ($Recordset1_endRow < $Recordset1_columns) {
    echo("<td>&nbsp;</td>");
    $Recordset1_endRow++;
}
echo("</tr>");
}?>
    </table>
  </div>
  <p>&nbsp;</p>
<p align="center">
  <input type="submit" name="button" id="button" value="送出" />
</p>
<input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
