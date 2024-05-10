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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_GET['ID'])) && ($_GET['ID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM ``admin`` WHERE ID=%s",
                       GetSQLValueString($_GET['ID'], "int"));

  mysql_select_db($database_stud, $stud);
  $Result1 = mysql_query($deleteSQL, $stud) or die(mysql_error());
}

$maxRows_rsdb1 = 10;
$pageNum_rsdb1 = 0;
if (isset($_GET['pageNum_rsdb1'])) {
  $pageNum_rsdb1 = $_GET['pageNum_rsdb1'];
}
$startRow_rsdb1 = $pageNum_rsdb1 * $maxRows_rsdb1;

mysql_select_db($database_stud, $stud);
$query_rsdb1 = "SELECT * FROM stud ORDER BY stud_id DESC";
$query_limit_rsdb1 = sprintf("%s LIMIT %d, %d", $query_rsdb1, $startRow_rsdb1, $maxRows_rsdb1);
$rsdb1 = mysql_query($query_limit_rsdb1, $stud) or die(mysql_error());
$row_rsdb1 = mysql_fetch_assoc($rsdb1);

if (isset($_GET['totalRows_rsdb1'])) {
  $totalRows_rsdb1 = $_GET['totalRows_rsdb1'];
} else {
  $all_rsdb1 = mysql_query($query_rsdb1);
  $totalRows_rsdb1 = mysql_num_rows($all_rsdb1);
}
$totalPages_rsdb1 = ceil($totalRows_rsdb1/$maxRows_rsdb1)-1;

$queryString_rsdb1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsdb1") == false && 
        stristr($param, "totalRows_rsdb1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsdb1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsdb1 = sprintf("&totalRows_rsdb1=%d%s", $totalRows_rsdb1, $queryString_rsdb1);
$query_rsdb1 = "SELECT * FROM stud ORDER BY stud_id DESC";
$rsdb1 = mysql_query($query_rsdb1, $stud) or die(mysql_error());
$row_rsdb1 = mysql_fetch_assoc($rsdb1);
$totalRows_rsdb1 = mysql_num_rows($rsdb1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style>
body {
	background-color: gray;
}
#tb {
	width: 65%;
	margin: 0 auto;
	padding: 15px;
	background-color: white;
	border-radius: 15px;
	
}

button {
	font-size: 25px;
	}

</style>
</head>
<body>
<div id="wrap">
<div id="tb">
<a href="index.php">回首頁</a>
<table>
        <tr>
        <td colspan="10" align="center"><p><a href="add.php"><button>新增</button></a></p><td>
        </tr>
	  <tr>
          <td scope="col"><strong>學號</strong></td>
          <td scope="col"><strong>相片</strong></td>
          <td scope="col"><strong>姓名</strong></td>
          <td scope="col"><strong>身份證號碼</strong></td>
          <td scope="col"><strong>性別</strong></td>
          <td scope="col"><strong>生日</strong></td>
          <td scope="col"><strong>學校</strong></td>
          <td scope="col"><strong>科系</strong></td>
          <td scope="col"><strong>電話</strong></td>
          <td scope="col"><strong>地址</strong></td>
          <td scope="col"><strong>地址</strong></td>
        </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_rsdb1['stud_id']; ?></td>
          <td><img src="學員相片/<?php echo $row_rsdb1['stud_photo'];?>" width=60px/></td>
          <td><a href="info.php?id=<?php echo $row_rsdb1['stud_id']; ?>"><?php echo $row_rsdb1['stud_name']; ?></a></td>
          <td><?php echo $row_rsdb1['stud_idno']; ?></td>
          <td><?php echo $row_rsdb1['stud_gender']; ?></td>
          <td><?php echo $row_rsdb1['stud_birthday']; ?></td>
          <td><?php echo $row_rsdb1['stud_school']; ?></td>
          <td><?php echo $row_rsdb1['stud_major']; ?></td>
          <td>0<?php echo $row_rsdb1['stud_phone']; ?></td>
          <td><?php echo $row_rsdb1['stud_address']; ?></td>
          <td>
          	<form name="form1" method="get" action="del.php">
            	<input name="id" type="hidden" value="<?php echo $row_rsdb1['stud_id']; ?>" />
                <button type="submit" >delete</button>
             </form>
            <form name="form2" method="get" action="edit.php">
            	<input name="id" type="hidden" value="<?php echo $row_rsdb1['stud_id']; ?>" />
                <button type="submit">edit</button>
             </form>
          </td>
        </tr>
        <?php } while ($row_rsdb1 = mysql_fetch_assoc($rsdb1)); ?>
<tr><table border="0">
  <tr>
    <td><?php if ($pageNum_rsdb1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, 0, $queryString_rsdb1); ?>">第一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsdb1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, max(0, $pageNum_rsdb1 - 1), $queryString_rsdb1); ?>">上一頁</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_rsdb1 < $totalPages_rsdb1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, min($totalPages_rsdb1, $pageNum_rsdb1 + 1), $queryString_rsdb1); ?>">下一頁</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_rsdb1 < $totalPages_rsdb1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, $totalPages_rsdb1, $queryString_rsdb1); ?>">最後一頁</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></tr>
</table>



</div>
</div>

</body>
</html>
<?php
mysql_free_result($rsdb1);
?>
