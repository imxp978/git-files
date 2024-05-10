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

$colname_rsdb1 = "-1";
if (isset($_GET['id'])) {
  $colname_rsdb1 = $_GET['id'];
}
mysql_select_db($database_stud, $stud);
$query_rsdb1 = sprintf("SELECT * FROM stud WHERE stud_id = %s", GetSQLValueString($colname_rsdb1, "int"));
$rsdb1 = mysql_query($query_rsdb1, $stud) or die(mysql_error());
$row_rsdb1 = mysql_fetch_assoc($rsdb1);
$totalRows_rsdb1 = mysql_num_rows($rsdb1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
body {
	background-image: url("學員相片/<?php echo $row_rsdb1['stud_photo'];?>");
	background-size: 150px;
	background-repeat: repeat;
}

.container {
	background-size: 150px;
	background-repeat: repeat;
	backdrop-filter:blur(5px); 
	background-color:rgba(255,255,255,0.2);
	op/acity: 0.8;
	p/osition:absolute;
	width: 100vw;
	height: 100vh;
	margin:0;
	padding: 0;
}

#wrap {
	display: flex;
	backdrop-filter:blur(8px), sepia(10%); 
	opacity: 1;
	}

#tb {
	width: 65%;
	margin: 10% auto;
	padding: 30px;
	border-radius: 15px;
	background-color: rgba(0, 0, 0, 0.8);
	font-size: 20px;
	box-shadow: 8px 8px 30px rgba(0,0,0,0.8);
	color: white;
	z-index: 99;
	
	}
	
#photo {
	width: 250px;
	float: right;
	
	
	}
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:hover {
	color: #FFF;
}
a:active {
	color: #CCC;
}
</style>
</head>

<body>
<div class="container">
	<div id="wrap">
		<div id ="tb">
          <table>
        
            <tr>
            <td rowspan="8"><img id="photo" src="學員相片/<?php echo $row_rsdb1['stud_photo'];?>" /></td>
                    <td>姓名：</td>
                    <td><?php echo $row_rsdb1['stud_name']; ?></td>
                    
                </tr>
                        <tr>
                    <td>身份證號碼：</td>
                    <td><?php echo $row_rsdb1['stud_idno']; ?></td>
                </tr>
                        <tr>
                    <td>性別：</td>
                    <td><?php echo $row_rsdb1['stud_gender']; ?></td>
                </tr>
                        <tr>
                    <td>生日：</td>
                    <td><?php echo $row_rsdb1['stud_birthday']; ?></td>
                </tr>
                        <tr>
                    <td>學校：</td>
                    <td><?php echo $row_rsdb1['stud_school']; ?></td>
                </tr>
                        <tr>
                    <td> 科系：</td>
                    <td><?php echo $row_rsdb1['stud_major']; ?></td>
                </tr>
                                <tr>
                    <td>電話：</td>
                    <td>0<?php echo $row_rsdb1['stud_phone']; ?></td>
                </tr>
                                <tr>
                    <td>地址：</td>
                    <td><?php echo $row_rsdb1['stud_address']; ?></td>
                </tr>
            </table>
	<hr />
  <a href="#" onclick="goback()">回到上一頁</a>
		</div>
	</div>
</div>
<script>
function goback() {
	history.back(1);
}
</script>
</body>
</html>
<?php
mysql_free_result($rsdb1);
?>
