


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<h1 align="center">上傳頁面</h1>
<div id="wrap">
	<table align="center">
    	<tr>
        	<td>
                <form action="add.php" method="post" enctype="multipart/form-data" id="form1" >
                                <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="2000000" /><label for="myfile">選擇上傳檔案: </label>

                <br />
                <input type="file" name="myfile" id="myfile" />
                <input type="submit" name="button" id="button" value="上傳">
                </form>
   		  </td>
        </tr>
	</table>
</div>
</body>
</html>