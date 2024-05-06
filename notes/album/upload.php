<?php require_once('Connections/album_conn.php'); ?>
<?php

include ("resize.php");

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



// 利用for loop插入多筆紀錄
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  header ('Content-type: text/html; charset=utf-8');
  $countNum = count($_POST['Comment']);
  for($i=0; $i<$countNum; $i++){
	  if($_FILES['Photo']['name'][$i] != '') {
		  if($_FILES['Photo']['error'][$i] > 0) {
			  
		  echo '檔案名稱: '.$_FILES['Photo']['name'][$i].'<br>';
		  switch($_FILES['Photo']['error'][$i])
		  {
			case 1: die('超出PHP.int限制'); break;
			case 2: die('超出限制'); break;
			case 3: die('部分上傳'); break;
			case 4: die('未上傳'); break;
		  }
		}
		
		$destDir = "photos";
		if(!is_dir($destDir) || !is_writeable($destDir))
			die('目錄不存在 無法寫入');
			
		//判斷格式
		$checkExt = getimagesize($_FILES['Photo']['tmp_name'][$i]);
		if ($checkExt[2] == NULL)
			die('檔案格式不符');	
			
		//插入紀錄
	/*	$insertSQL = sprintf("INSERT INTO album (Name, Name_thumb, `Comment`) VALUES (%s, %s, %s)",
                       GetSQLValueString('a', "text"),
                       GetSQLValueString('b', "text"),
                       GetSQLValueString('c', "text"));

		  mysql_select_db($database_album_conn, $album_conn);
		  $Result1 = mysql_query($insertSQL, $album_conn) or die(mysql_error());
		
		  $insertGoTo = "upload.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		    */
		
		
		//取得副檔名
		switch($checkExt[2]){
			case 1: $Ext = 'gif'; break;
			case 2: $Ext = 'jpg'; break;
			case 3: $Ext = 'png'; break;
			}
		
		//檔案命名
		$Name = date("Ymd") . "_" . substr(md5(uniqid(rand())),0,5). "." . $Ext;
		
		//複製暫存檔
		move_uploaded_file($_FILES['Photo']['tmp_name'][$i], $destDir. "/" . $Name);
		
		// 判斷是否縮圖
		if ($_POST['checkResize']) {
			$src = $destDir . "/" . $Name;
			$dest = $src;
			$destW = $_POST['px'];
			$destH = $destW;
			imagesResize($src, $dest, $destW, $destH);
		}
		
		//產生預覽圖
		$src = $destDir . "/" . $Name;
		$dest = $destDir . "/thum/" . "thum_" . $Name;
		$destW = 100;
		$destH = 100;
		imagesResize($src, $dest, $destW, $destH);
		
		
		//插入紀錄
		$insertSQL = sprintf("INSERT INTO album (Name, Name_thumb, `Comment`) VALUES (%s, %s, %s)",
                       GetSQLValueString($src, "text"),
                       GetSQLValueString($dest, "text"),
                       GetSQLValueString($_POST['Comment'][$i], "text"));

		  mysql_select_db($database_album_conn, $album_conn);
		  $Result1 = mysql_query($insertSQL, $album_conn) or die(mysql_error());
		
		  $insertGoTo = "upload.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		  
		
		} // if($_FILES['Photo']['name'][$i] != "")
  }// for ($i=0; $i< $countNum; $i++)
}

	// $countNum=count($_POST['Comment']);
	// for($i=0; $i<$countNum; $i++) 
	// echo '上傳檔案名稱:'.$_FILES['Photo']['name'][$i].'<BR>'; 
	if (!isset($_GET['Num']) || ($_GET['Num']<=3))
		$Num=3;
	else 
		$Num=$_GET['Num'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<div id="wrap">
	<h1>網路相簿</h1>
    
  <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1">
    <table align="center">
    	<?php for($i=0; $i<$Num; $i++) { ?>
        <tr>
        	<td>
    	        <input name="Photo[]" id="Photo" type="file"/>
			</td>
        </tr>
        <tr>
            <td>
   	        	<label for="Comment[]">說明: </label><input name="Comment[]" id="Comment[]" type="text" />
            </td>
        </tr>
        <?php } ?>
    </table>
    <table align="center">
    	<tr>
        	<td><a href="upload.php?Num=<?php echo ++$Num; ?>">新增檔案</a></td>
            <td>
            	<input name="checkResize" type="checkbox" /><label for="px">縮圖為:</label>
                <input name="px" type="number" />px<input type="submit" value="送出">
            </td>
        </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
    </form>
</div>


</body>
</html>