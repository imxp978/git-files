<?php
	include_once('sqlConn.php');
	$con -> select_db('my_db');

	$id = $_GET['id'];
	$result = $con -> query(
		"SELECT * FROM persons WHERE id=$id"
	);
	
	while ($row = $result -> fetch_array()) {
		
	echo $id;
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	 <table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
		</tr>
		<tr>
			<td><input type="text" value="<?php 
				'$row['FirstName'].'
				?>"></td>
			<td><input type="text" value=""></td>
			<td><input type="number" value=""></td>
			</tr>

		<tr>
			<td colspan="3"><input type="button" value="送出" ></td>
		</tr>
</table>
		
</body>
</html>
