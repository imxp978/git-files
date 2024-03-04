<?php
	include("sqlConn.php");
	$con->select_db("my_db");

	if (isset($_POST['submit2'])) {
		
		$sql = "UPDATE persons SET FirstName = '$_POST[FirstName]', LastName = '$_POST[LastName]', Age = '$_POST[Age]' WHERE personID = " .$_GET['id'];

		$con->query($sql);
		header ("location:index.php");
	}

	$sql = "SELECT * FROM persons WHERE personID =".$_GET['id'];
	$result = $con->query($sql);
	$row = $result->fetch_array();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>UPDATE <?php echo $_GET['id']; ?></title>
	</head>

	<body>
		<form name="form1" method="POST" action="">
			<table border="1">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
				</tr>
				<tr>
					<td><input name="FirstName" type="text" value="<?php echo $row['FirstName']; ?>"></td>
					<td><input name="LastName" type="text" value="<?php echo $row['LastName']; ?>"></td>
					<td><input name="Age" type="number" value="<?php echo $row['Age']; ?>"></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><input type="submit" name="submit2" value="送出" ></td>
				</tr>
			</table>
		</form>
	</body>
</html>
