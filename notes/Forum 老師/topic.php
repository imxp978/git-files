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
</head>

<body>
<div align="center">
  <h3>討論區 </h3>
</div>
<hr />
<table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><a href="index.php">討論區首頁</a></td>
    <td width="300"><div align="right"><a href="post.php">發表主題</a>　<a href="search.php">搜尋</a></div></td>
  </tr>
</table>
<br />
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="520"><h4><font color="#3366CC"></font><?php echo $row_Recordset1['Title']; ?></h4></td>
    <td width="80"><div align="center"><a href="reply.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>">回覆主題</a></div></td>
  </tr>
</table>
<table width="600" border="1" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="100" bgcolor="#3366CC"><div align="center"><font color="#FFFFFF">發表人</font></div></td>
    <td bgcolor="#3366CC"><div align="center"><font color="#FFFFFF">內容</font></div></td>
  </tr>
  <tr>
    <td width="100" rowspan="2" bgcolor="#EFEFEF"><div align="center"><strong><?php echo $row_Recordset1['Nickname']; ?></strong><br />
        <img src="img/icon_delete.gif" width="15" height="18" border="0" /><img src="img/icon_email.gif" width="30" height="18" border="0" /><br />
    </div></td>
    <td valign="top" bgcolor="#EFEFEF"><?php echo $row_Recordset1['Content']; ?></td>
  </tr>
  <tr>
    <td height="18" valign="baseline" bgcolor="#EFEFEF"><div align="right">發表時間：<?php echo $row_Recordset1['Time']; ?></div></td>
  </tr>
</table>

    <table width="600" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#EEEEFB">
      <tr>
        <td width="100" rowspan="2" bgcolor="DEE3E7"><div align="center"><strong>Cttlee</strong><br />
            <img src="img/icon_delete.gif" width="15" height="18" border="0" /><img src="img/icon_email.gif" width="30" height="18" border="0" /></div></td>
        <td valign="top" bgcolor="DEE3E7">回應內容</td>
      </tr>
      <tr>
        <td bgcolor="DEE3E7"><div align="right">發表時間：</div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
