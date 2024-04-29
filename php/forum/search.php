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

$maxRows_Recordset1 = 3;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['search'])) {
  $colname_Recordset1 = $_POST['search'];
}
mysql_select_db($database_forum, $forum);
$query_Recordset1 = sprintf("SELECT * FROM topic WHERE Title LIKE %s OR Content LIKE %s ORDER BY TopicID DESC", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"),GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $forum) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$colname_Recordset2 = "-1";
if (isset($_POST['search'])) {
  $colname_Recordset2 = $_POST['search'];
}
mysql_select_db($database_forum, $forum);
$query_Recordset2 = sprintf("SELECT topic.TopicID, topic.Title, reply.Content FROM topic INNER JOIN reply  ON topic.TopicID = reply.Reply_TopicID   WHERE reply.Content LIKE %s ORDER BY reply.ID DESC", GetSQLValueString("%" . $colname_Recordset2 . "%", "text"));
$Recordset2 = mysql_query($query_Recordset2, $forum) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"><form id="form1" name="form1" method="post" action="">
      <a href="http://localhost/forum/index.php">回首頁</a><span> | </span>
    <a href="#" onclick="goBack()">回上頁</a>
    </form></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><form id="form2" name="form1" method="post" action="">
      <label for="textfield"></label>
      <input type="text" name="search" id="textfield" placeholder="請輸入關鍵字"/>
      <input type="submit" name="button" id="button" value="搜尋" />
    </form></td>
  </tr>
</table>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"> <?php if ($totalRows_Recordset1 == 0 && $totalRows_Recordset2 == 0) { // Show if recordset empty ?>
  <h1>&nbsp;</h1>
  <h1>&nbsp;</h1>
  <h1>&nbsp;</h1>
  <h1>搜尋阿!</h1>
  <?php } // Show if recordset empty ?>    </th>
  </tr>
</table>
<p>&nbsp;</p>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"> <?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
        <h2>相關的主題: </h2><hr />
  <?php } // Show if recordset not empty ?>    </th>
  </tr>
</table>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
    <?php do { ?>
      <tr>
        <th align="left" scope="col"><h3><?php echo $row_Recordset1['Title']; ?></h3></th>
      </tr>
      <tr>
        <td><?php echo $row_Recordset1['Content']; ?></td>
      </tr>
      <tr>
        <td align="right"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
            <a href="topic.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>">前往文章</a>
            <?php } // Show if recordset not empty ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<p></p>
<p></p>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"> <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?><h2>
        相關的回覆: </h2><hr />
  <?php } // Show if recordset not empty ?>    </th>
  </tr>
</table>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php do { ?>
  <tr>
    <th align="left" scope="col"><h3><?php echo $row_Recordset2['Title']; ?></h3></th>
  </tr>
  <tr>
    <td><?php echo $row_Recordset2['Content']; ?></td>
  </tr>
  <tr>
    <td align="right"><?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
        <a href="topic.php?TopicID=<?php echo $row_Recordset2['TopicID']; ?>">前往文章</a>
        <?php } // Show if recordset not empty ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p></p>
<p>&nbsp;</p>
<script>
function goBack() {
	history.back(1);
	}
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
