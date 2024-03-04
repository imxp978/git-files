<?php
	include_once('sqlConn.php');
	$con -> select_db('my_db');
	$result = $con -> query(
		"SELECT * FROM persons WHERE id= "
	);

	echo '<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
		</tr>
		<tr>
			<form method="get" action="">
			<td><input name="FirstName" type="text" value=""></td>
			<td><input name="LastName" type="text" value=""></td>
			<td><input name="Age" type="number" value=""></td>
			</form>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" id="submit" value="送出" ></td>
		</tr>
		
	</table>'
?>