<?php
	include_once('sqlConn.php');

	$con -> select_db('my_db');

	$con -> query("INSERT INTO persons(FirstName, LastName, Age) VALUES('Peter', 'Griffin', '35')");

	$con -> query("INSERT INTO persons(FirstName, LastName, Age) VALUES('Gleen', 'Quagmire', '33')");

	$con -> close();
?>