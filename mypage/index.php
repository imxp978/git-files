<?php
	include_once('sqlConn.php');

	$con -> select_db('my_db');
	$result = $con -> query(
		"SELECT * FROM persons"
	);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
</head>

<body>
	<a href="add.php">New Record</a>
	<table border="1">
		<tr>
			<th>PersonID</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Age</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php
			while($row = $result -> fetch_array()) {
				echo "<tr>";
				echo "<td>".$row['personID']."</td>";
				echo "<td>".$row['FirstName']."</td>";
				echo "<td>".$row['LastName']."</td>";
				echo "<td>".$row['Age']."</td>";
				echo "<td><a href=\"update.php?id=$row[personID]\">Update</a></td>";
				echo "<td><a href=\"delete.php?id=$row[personID]\" onclick=\"return confirm('確認要刪除嗎?');\">Delete</a></td>";
				echo "</tr>";
			}
			echo "</table>";
			$con -> close();
		?>
</body>
</html>
