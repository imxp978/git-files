<?php
	include_once('sqlConn.php');
	$con -> select_db('my_db');

	$id = $_GET['id'];
	$result = $con -> query(
		"SELECT * FROM persons WHERE id=$id"
	);
	
	while ($row = $result -> fetch_array()) {
		
	echo $id;
?>
	echo '<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
		</tr>
		<tr>';
	echo '<td><input type="text" value="'.$row['FirstName'].'"></td>';
	echo '<td><input type="text" value=""></td>';
	echo '<td><input type="number" value=""></td>';
	echo '</tr>';
	}
	echo '<tr>
		<td colspan="3"><input type="button" value="送出" ></td>
	</tr>
</table>';
	
?>