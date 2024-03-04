<?php
	include_once('sqlConn.php');

	$con -> select_db('my_db');
	$result = $con -> query(
		"SELECT * FROM persons");

	while($row = $result -> fetch_array()) {
		echo $row['FirstName']." ".$row['LastName']."<br>";
	}
?>