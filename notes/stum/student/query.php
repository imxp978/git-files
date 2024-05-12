<?php require_once('Connections/stud_conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<a href="index.php">回首頁</a>
<form method="get" action="">

<select name="select">
<option value="stud_name">姓名</option>
<option value="stud_address">地址</option>
<option value="stud_school">大學</option>
<option value="stud_major">主修</option>
<option value="stud_birthday">生日(YYYY-MM-DD)</option>
<option value="stud_phone">電話</option>
<option value="stud_gender">性別(M/F)</option>
<option value="stud_idno">身分證字號</option>
</select>
<input type="text" name="data"/>

<button type="submit">送出</button>
</form>



<?php

	
if ((isset($_GET['select']))&&($_GET['data'])) {
	$select = $_GET['select'];
	$data = $_GET['data'];	
	$SQLstring = sprintf("SELECT * FROM stud WHERE %s LIKE '%%%s%%' ;", $select , $data );
	$list = $link->query($SQLstring);
?>
<hr />
<?php 
echo ($SQLstring);
?>
<hr />
<table>
<?php
	if ($list) {
		while ($list_Rows = $list->fetch()) { ?>
	
    <tr>
    	<td><a href="info.php?id=<?php echo $list_Rows['stud_id']?>"><?php echo $list_Rows['stud_name'] ?></a></td>
    	<td><?php echo $list_Rows['stud_school'] ?></td>
        <td><?php echo $list_Rows['stud_address'] ?></td>
     </tr>
<?php	}} ?>
</table>

<?php } ?>
</body>
</html>