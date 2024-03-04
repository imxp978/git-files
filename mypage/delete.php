<?php
	include("sqlConn.php");
	$con->select_db("my_db");
	
	if (isset($_GET['id']) && $_GET['id'] != "") {
		$sql = "DELETE FROM persons WHERE personID = $_GET[id]"; 
		$con->query($sql);
	}
	header ("location:index.php");
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DETELE</title>
	</head>

	<body>
	</body>
</html>
