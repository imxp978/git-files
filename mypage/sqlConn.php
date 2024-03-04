<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	$con = new mysqli($servername, $username, $password);

	if (mysqli_connect_errno()) {
		echo "Connection Failed: ".$con -> connect_error;
	}

?>


