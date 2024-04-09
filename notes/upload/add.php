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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO upload (UserFilename, ServerFilename, `Size`, `Comment`) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['UserFilename'], "text"),
                       GetSQLValueString($_POST['ServerFilename'], "text"),
                       GetSQLValueString($_POST['Size'], "text"),
                       GetSQLValueString($_POST['Comment'], "text"));

  mysql_select_db($database_uploadConn, $uploadConn);
  $Result1 = mysql_query($insertSQL, $uploadConn) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_POST['ID'])) {
  $colname_Recordset1 = $_POST['ID'];
}
mysql_select_db($database_uploadConn, $uploadConn);
$query_Recordset1 = sprintf("SELECT * FROM upload WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $uploadConn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

echo "檔案名稱:".$_FILES['myfile']['name']."<br>";
echo "檔案大小:".$_FILES['myfile']['size']."<br>";
echo "檔案格式:".$_FILES['myfile']['type']."<br>";
echo "暫存名稱:".$_FILES['myfile']['tmp_name']."<br>";
echo "錯誤代碼:".$_FILES['myfile']['error']."<br>";
echo "<br>";
if($_FILES['myfile']['error'] > 0)
{
   switch($_FILES['myfile']['error'])
  {
     case 1 : die("檔案大小超出 php.ini:upload_max_filesize 限制");
     case 2 : die("檔案大小超出 MAX_FILE_SIZE 限制");
     case 3 : die("檔案僅被部分上傳");
     case 4 : die("檔案未被上傳");
  }
}
//is_uploaded_file是PHP內建的函數 會return boolean
if(is_uploaded_file($_FILES['myfile']['tmp_name']))
{
   $DestDIR = "files"; //指定儲存資料夾
   if(!is_dir($DestDIR) || !is_writeable($DestDIR))
         die("目錄不存在或無法寫入");

  $File_Extension = explode(".", $_FILES['myfile']['name']); 
  
  //check filename slicing result
  foreach ($File_Extension as $element) {
	  echo $element." + ";}
	// sizeof跟count功能一樣，都是用來計算array裡面有幾個元素
	
  $File_Extension = $File_Extension[sizeof($File_Extension)-1]; 
  $ServerFilename = date("YmdHis") . "." . $File_Extension;
move_uploaded_file($_FILES['myfile']['tmp_name'] , $DestDIR . "/" . $ServerFilename );
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<h1 align="center">寫入紀錄頁面</h1>
<div id="wrap">
	<table align="center">
    	<tr>
        	<td>
                <form action="<?php echo $editFormAction; ?>" name="form1" method="POST" enctype="multipart/form-data" id="form1" >
                <label for="UserFilename">檔案名稱: </label>
                <input name="UserFilename" type="text" id="UserFilename" value="<?php echo $_FILES['myfile']['name'];?>" /><br />
                <label for="Size">檔案大小: </label>
                <input name="Size" type="text" id="Size" value="<?php echo $_FILES['myfile']['size'];?>" /><br />
                <label for="Comment">檔案註解: </label>
                <textarea name="Comment" id="Comment" /></textarea>
                <input name="ServerFilename" type="hidden" id="ServerFilename" value="<?php echo $ServerFilename; ?>" />
                <br />
                <button type="submit" id="button" value="上傳">上傳</button>
                <input type="hidden" name="MM_insert" value="form1" />
                </form>
   		  </td>
        </tr>
	</table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
