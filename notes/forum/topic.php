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

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset2 = $_GET['TopicID'];
}
mysql_select_db($database_forum, $forum);
$query_Recordset2 = sprintf("SELECT * FROM reply WHERE Reply_TopicID = %s ORDER BY ID DESC", GetSQLValueString($colname_Recordset2, "int"));
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $forum) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style>

a {
	text-decoration: none;
}

table {
	text-align: left;
	bo/rder: 1px dotted black;
	line-height: 2em;
}

.title {
	background-color: blue;
	color: white;	
}

.reply {
	border-bottom: 1px dotted black;	
	
}

</style>
</head>

<body>
<h1>討論區</h1>
<div id="container" align="center">

  <table width="65%" cellspacing="0" cellpadding="0">
    <tr>
      <td scope="col"><a href="index.php">討論區首頁</a></td>
      <td align="right" scope="col"><a href="post.php">發表主題 搜尋</a></td>
    </tr>

  </table>
	<br />
  <table width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td scope="col">&nbsp;</td>
      <td align="right" scope="col"><a href="reply.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>">回覆主題</a></td>
    </tr>
</table>
<br />
<table width="65%" border="0" cellspacing="0" cellpadding="0">
  <tr class="title"><td>發表人</td><td>內容</td>
  </tr>
  <tr >
    <td rowspan="2" scope="col"><?php echo $row_Recordset1['Nickname']; ?></td>
    <td scope="col"><?php echo $row_Recordset1['Content']; ?></td>
    </tr>
  <tr>
    <td align="right">發表時間: <?php echo $row_Recordset1['Time']; ?></td>
    </tr>
</table>
<br />
<?php do { ?>
  <table  class="reply" width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td rowspan="2" bgcolor="#CCCCCC" scope="col" ><?php echo $row_Recordset2['Nickname']; ?></td>
      <td bgcolor="#CCCCCC" scope="col"><?php echo $row_Recordset2['Content']; ?></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#CCCCCC">發表時間: <?php echo $row_Recordset2['Time']; ?></td>
      </tr>
  </table>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>

</div>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
