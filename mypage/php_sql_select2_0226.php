<?php
	include_once('sqlConn.php');

	$con -> select_db('my_db');
	$result = $con -> query(
		"SELECT * FROM persons"
	);

	echo '<table border="1">
	<tr>
	<th>PersonID</th>
	<th>FirstName</th>
	<th>LastName</th>
	</tr>
	';

	while($row = $result -> fetch_array()) {
		echo "<tr>";
		echo "<td>".$row['personID']."</td>";
		echo "<td>".$row['FirstName']."</td>";
		echo "<td>".$row['LastName']."</td>";
		echo "</tr>";
	}

	echo "</table>";
	$con -> close();
?>