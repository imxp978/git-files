<?php require_once('Connections/news.php'); ?>
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

$maxRows_rsdb1 = 10;
$pageNum_rsdb1 = 0;
if (isset($_GET['pageNum_rsdb1'])) {
  $pageNum_rsdb1 = $_GET['pageNum_rsdb1'];
}
$startRow_rsdb1 = $pageNum_rsdb1 * $maxRows_rsdb1;

mysql_select_db($database_news, $news);
$query_rsdb1 = "SELECT * FROM news";
$query_limit_rsdb1 = sprintf("%s LIMIT %d, %d", $query_rsdb1, $startRow_rsdb1, $maxRows_rsdb1);
$rsdb1 = mysql_query($query_limit_rsdb1, $news) or die(mysql_error());
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新聞系統</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id="warp">
  <div id="header">
    <div class="topfunction"><a href="index.php" title="回到首頁"><img src="images/House.png" alt="回到首頁" width="32" height="32" /></a><a href="login.php" title="登入管理介面"><img src="images/Lock.png" alt="登入管理介面" width="32" height="32" /></a></div>
    <div class="logo"><img src="images/DWonline.png" width="180" height="40" alt="dreamweaver.com.tw" /></div>
  </div>
  <div class="contentcontainer">
    <div class="headings altheading">
      <h2>新聞系統</h2>
    </div>  
    <div class="contentbox">
    	<!-- Status Bar Start --><!-- Status Bar End -->
        
         <!-- Red Status Bar Start --><!-- Red Status Bar End -->
        
        <!-- Green Status Bar Start --><!-- Green Status Bar End -->
        
        <!-- Blue Status Bar Start --><!-- Blue Status Bar End -->
        <div class="status warning">
          <p><img src="images/icon_warning.png" alt="Warning" /><span>注意</span> 目前新聞資料庫中並沒有任何資料！</p>
        </div>
<table width="100%">
          <tr>
              <th align="left">分類</th>
              <th align="left">標題</th>
              <th align="left">時間</th>
              <th align="left">點閱</th>
        </tr>
            <?php do { ?>
              <tr class="alt">
                <td><div class="typeblock"><?php echo $row_rsdb1['news_type']; ?>&nbsp;</div></td>
                <td></a> <img src="images/new.gif" width="28" height="11" /><a href="detail.php?id=<?php echo $row_rsdb1['news_id']; ?>"><?php echo $row_rsdb1['news_subject']; ?></a></td>
                <td><?php echo $row_rsdb1['news_date']; ?></td>
                <td><?php echo $row_rsdb1['news_hits']; ?></td>
              </tr>
              <?php } while ($row_rsdb1 = mysql_fetch_assoc($rsdb1)); ?>
      </table>
          <div class="extrabottom">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="simpletb">
              <tr>
                <td align="left"><a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, max(0, $pageNum_rsdb1 - 1), $queryString_rsdb1); ?>">上一頁</a></td>
                <td align="right"><a href="<?php printf("%s?pageNum_rsdb1=%d%s", $currentPage, min($totalPages_rsdb1, $pageNum_rsdb1 + 1), $queryString_rsdb1); ?>">下一頁</a></td>
              </tr>
            </table>
          </div>
<div id="footer">&copy; Copyright 2012 eHappy Studio 織夢新聞系統</div>
    </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($rsdb1);
?>
