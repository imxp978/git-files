<?php
#	BuildNav for Dreamweaver MX v0.2
#              10-02-2002
#	Alessandro Crugnola [TMM]
#	sephiroth: alessandro@sephiroth.it
#	http://www.sephiroth.it
#	
#	Function for navigation build ::
function buildNavigation($pageNum_Recordset1,$totalPages_Recordset1,$prev_Recordset1,$next_Recordset1,$separator=" | ",$max_links=10, $show_page=true)
{
                GLOBAL $maxRows_Recordset2,$totalRows_Recordset2;
	$pagesArray = ""; $firstArray = ""; $lastArray = "";
	if($max_links<2)$max_links=2;
	if($pageNum_Recordset1<=$totalPages_Recordset1 && $pageNum_Recordset1>=0)
	{
		if ($pageNum_Recordset1 > ceil($max_links/2))
		{
			$fgp = $pageNum_Recordset1 - ceil($max_links/2) > 0 ? $pageNum_Recordset1 - ceil($max_links/2) : 1;
			$egp = $pageNum_Recordset1 + ceil($max_links/2);
			if ($egp >= $totalPages_Recordset1)
			{
				$egp = $totalPages_Recordset1+1;
				$fgp = $totalPages_Recordset1 - ($max_links-1) > 0 ? $totalPages_Recordset1  - ($max_links-1) : 1;
			}
		}
		else {
			$fgp = 0;
			$egp = $totalPages_Recordset1 >= $max_links ? $max_links : $totalPages_Recordset1+1;
		}
		if($totalPages_Recordset1 >= 1) {
			#	------------------------
			#	Searching for $_GET vars
			#	------------------------
			$_get_vars = '';			
			if(!empty($_GET) || !empty($HTTP_GET_VARS)){
				$_GET = empty($_GET) ? $HTTP_GET_VARS : $_GET;
				foreach ($_GET as $_get_name => $_get_value) {
					if ($_get_name != "pageNum_Recordset2") {
						$_get_vars .= "&$_get_name=$_get_value";
					}
				}
			}
			$successivo = $pageNum_Recordset1+1;
			$precedente = $pageNum_Recordset1-1;
			$firstArray = ($pageNum_Recordset1 > 0) ? "<a href=\"$_SERVER[PHP_SELF]?pageNum_Recordset2=$precedente$_get_vars\">$prev_Recordset1</a>" :  "$prev_Recordset1";
			# ----------------------
			# page numbers
			# ----------------------
			for($a = $fgp+1; $a <= $egp; $a++){
				$theNext = $a-1;
				if($show_page)
				{
					$textLink = $a;
				} else {
					$min_l = (($a-1)*$maxRows_Recordset2) + 1;
					$max_l = ($a*$maxRows_Recordset2 >= $totalRows_Recordset2) ? $totalRows_Recordset2 : ($a*$maxRows_Recordset2);
					$textLink = "$min_l - $max_l";
				}
				$_ss_k = floor($theNext/26);
				if ($theNext != $pageNum_Recordset1)
				{
					$pagesArray .= "<a href=\"$_SERVER[PHP_SELF]?pageNum_Recordset2=$theNext$_get_vars\">";
					$pagesArray .= "$textLink</a>" . ($theNext < $egp-1 ? $separator : "");
				} else {
					$pagesArray .= "$textLink"  . ($theNext < $egp-1 ? $separator : "");
				}
			}
			$theNext = $pageNum_Recordset1+1;
			$offset_end = $totalPages_Recordset1;
			$lastArray = ($pageNum_Recordset1 < $totalPages_Recordset1) ? "<a href=\"$_SERVER[PHP_SELF]?pageNum_Recordset2=$successivo$_get_vars\">$next_Recordset1</a>" : "$next_Recordset1";
		}
	}
	return array($firstArray,$pagesArray,$lastArray);
}
?>
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

$maxRows_Recordset2 = 2;
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
	bor/der: 1px dotted black;
	borde/r-radius: 15px;
	overlay: hidden;
	line-height: 2em;
	padding: 2px;
}

.main {
	background: #F7F7F7;
}

.author {
	background-color: #69C;
	padding: 15px;
}

.commentor {
	background-color: #09F;
	padding: 15px;
}

.content {
	background-color: #FFF;
	padding: 15px;
}

.title {
	background-color: lightblue;
	color: white;	
}

.reply {
	bord/er-bottom: 1px dotted black;	
	background: #F7F7F7;

}

</style>
</head>

<body>
<h1 align="center">討論區</h1>
<div id="container" align="center">

  <table width="65%" cellspacing="0" cellpadding="0">
    <tr>
      <td scope="col"><a href="index.php">討論區首頁</a></td>
      <td align="right" scope="col"><a href="post.php">發表主題</a> | <a href="search.php">搜尋</a></td>
    </tr>

  </table>
	<br />
  <table width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td scope="col">&nbsp;</td>
      <td align="right" scope="col"><a href="reply.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>">回覆主題</a></td>
    </tr>
</table>

  <?php if ($pageNum_Recordset2 == 0) { // Show if first page ?>
  <table width="65% align="left="left"">
    <tr>
      <td colspan="3"><h3><?php echo $row_Recordset1['Title']; ?></h3></td>
    </tr>
  </table>
  <table class="main"  width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr class="title"><td>發表人</td><td>內容</td>
      </tr>
    <tr class="main">
      <td width="25%" rowspan="2" align="left" valign="top" class="author" scope="col"><p><?php echo $row_Recordset1['Nickname']; ?></p>
        <p><a href="deltopic.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>"><img src="img/icon_delete.gif" width="15" height="18" /></a> <a href="mailto:<?php echo $row_Recordset1['Email']; ?>"> <img src="img/icon_email.gif" width="30" height="18" /></a></p></td>
      <td class="content" scope="col"><?php echo $row_Recordset1['Content']; ?></td>
      </tr>
    <tr>
      <td class="content" align="right">發表時間: <?php echo $row_Recordset1['Time']; ?></td>
      </tr>
  </table>
  <p>&nbsp;</p>
  <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
    <table width="65% align="left">
      <tr>
        <td colspan="3"> <h3>回覆留言:</h3></td>
        </tr>
    </table>
    <?php } // Show if recordset not empty ?>
<?php } // Show if first page ?>

<?php do { ?>
    <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>

      <table class="reply" width="65%" bgcolor="lightgray" border="0" cellspacing="0" cellpadding="0">

    <tr >
      <td class="commentor" width="25%" rowspan="2" align="left" valign="top" scope="col" ><p><?php echo $row_Recordset2['Nickname']; ?></p>
        <a href="delreply.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>&amp;ReplyID=<?php echo $row_Recordset2['ID']; ?>"><img src="img/icon_delete.gif" width="15" height="18" /></a><a href="mailto:<?php echo $row_Recordset2['Email']; ?>"><img src="img/icon_email.gif" width="30" height="18" /></a></td>
      <td class="content" scope="col"><?php echo $row_Recordset2['Content']; ?></td>
      </tr>
    <tr>
      <td class="content" align="right">發表時間: <?php echo $row_Recordset2['Time']; ?></td>
      </tr>
  </table>
<p>&nbsp;</p>
<?php } // Show if recordset not empty ?>
<?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
  <br />
<p>&nbsp;</p>


</div>


</div>
<table width="65%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="right" scope="col">&nbsp;
      <?php 
# variable declaration
$prev_Recordset2 = "« previous";
$next_Recordset2 = "next »";
$separator = " | ";
$max_links = 10;
$pages_navigation_Recordset2 = buildNavigation($pageNum_Recordset2,$totalPages_Recordset2,$prev_Recordset2,$next_Recordset2,$separator,$max_links,true); 

print $pages_navigation_Recordset2[0]; 
?>
    <?php print $pages_navigation_Recordset2[1]; ?> <?php print $pages_navigation_Recordset2[2]; ?></th>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
