<?php
	include_once('sqlConn.php');

	$con -> select_db('my_db');
	$result = $con -> query(
		"SELECT * FROM persons"
	);

	echo '<a href="add.php">New Record</a>
	<table border="1">
	<tr>
	<th>PersonID</th>
	<th>FirstName</th>
	<th>LastName</th>
	<th>Age</th>
	<th>Update</th>
	<th>Delete</th>
	</tr>
	';

	while($row = $result -> fetch_array()) {
		echo "<tr>";
		echo "<td>".$row['personID']."</td>";
		echo "<td>".$row['FirstName']."</td>";
		echo "<td>".$row['LastName']."</td>";
		echo "<td>".$row['Age']."</td>";
		echo '<td><a href="edit.php/?id='.$row['personID'].'">Update</a></td>';
		echo '<td><a href="delete.php/?id='.$row['personID'].'">Delete</a></td>';
		echo "</tr>";
	}

	echo "</table>";
	$con -> close();
?>