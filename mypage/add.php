<?php
	include("sqlConn.php");
	$con->select_db("my_db");

	if (isset($_POST['submit'])) {

		$sql="INSERT INTO persons(FirstName, LastName, Age) 
			VALUES ('$_POST[FirstName]', '$_POST[LastName]', '$_POST[Age]')";

		$con->query($sql);
		header ("location: index.php");
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

	<body>
		<form name="data" method="POST" action="">
			<table border="1">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
				</tr>
				<tr>
					<td><input id="FirstName" name="FirstName" type="text" value=""></td>
					<td><input id="LastName" name="LastName" type="text" value=""></td>
					<td><input id="Age" name="Age" type="number" value=""></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" name="submit" value="送出" ></td>
				</tr>
			</table>
		</form>
	</body>
</html>
