<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>

</style>
</head>

<body>
<!--	<?php
		echo $_POST['name']."<br>";
		echo $_POST['gender']."<br>";
		echo $_POST['year']."<br>";
		echo $_POST['month']."<br>";
		echo $_POST['day']."<br>";
		echo $_POST['hobby']."<br>";
	?>-->
	
	
	<div>
		<table border="1" align="center">
			<tr>
				<td><img src="img/<?php
						echo $_POST['gender'];
						?>.jpg"><br>
					
					
					use if:<br>
					<img src="img/<?php
						if ($_POST["gender"] == "male") {
							echo 'male.jpg">';
						}else if ($_POST["gender"] == "female") {
							echo 'female.jpg">';
						}
						?>
				</td>
				<td>
					姓名: 
					<?php
						echo $_POST['name']
					?></td>
			</tr>
			<tr>
				<td>
					生日: 
					<?php
						echo $_POST['year']."/".$_POST['month']."/".$_POST['day'];
					?>
				</td>
				<td>
					興趣: 
					<?php
						if (isset($_POST['hobby1'])) {
							echo $_POST['hobby1']." ";
						}
						if (isset($_POST['hobby2'])) {
							echo $_POST['hobby2']." ";
						}
						if (isset($_POST['hobby3'])) {
							echo $_POST['hobby3']." ";
						}
						if (isset($_POST['hobby4'])) {
							echo $_POST['hobby4']." ";
						}
					?>
					<hr>
					興趣(foreach): 
					<?php
						
						$result = $_POST['hobby02'];
						foreach ($result as $value){
							echo $value." ";
						}
					?>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>