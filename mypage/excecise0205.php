<?php include("php0205_functions.php")?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	<table border="1" align="center">
		<tr>
			<td>
				<form action="excecise0205.php" method="POST" >
	
					<label for="num1">num 1: </label>
					<input name="num1" id="num1" type="number" ><br>

					<label for="num2">num 2: </label>
					<input name="num2" id="num2" type="number" ><br>

					<label for="sign">運算: </label>
					<input name="sign" id="sign" type="radio" value="+">加
					<input name="sign" id="sign" type="radio" value="-">減
					<input name="sign" id="sign" type="radio" value="*">乘
					<input name="sign" id="sign" type="radio" value="/">除
					<br>
					<input name="submit" type="submit" value="計算">
					<hr>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<div id="ans">	
					<?php
						if (!isset($_POST['num1']) || !isset($_POST['num2']) || !isset($_POST['sign'])) {
							echo "輸入各欄位<br>";					
						}else {							
							$num1 = $_POST['num1'];	
							$num2 = $_POST['num2'];
							$sign = $_POST['sign'];
							function calcu($num1, $num2, $sign) {
								if ($sign=="+") {
									return $num1 + $num2;
								} elseif ($sign=="-") {
									return $num1 - $num2;
								} elseif ($sign=="*") {
									return $num1 * $num2;
								} elseif ($sign=="/") {
									return $num1 / $num2;
								}
							}
							if (isset($_POST['submit'])) {
								echo $num1.$sign.$num2."=".calcu($num1, $num2, $sign)."<br>";								
							}

							echo "<br><b>#use included function: </b>"."<br>";
							if ($sign == "+") {
								echo $num1.$sign.$num2."=".add($num1, $num2);
							}elseif ($sign == "-") {
								echo $num1.$sign.$num2."=".sub($num1, $num2);	
							}elseif ($sign == "*") {
								echo $num1.$sign.$num2."=".mul($num1, $num2);	
							}elseif ($sign == "/") {
								echo $num1.$sign.$num2."=".div($num1, $num2);	
							}
						}		
					?>		
				</div>
			</td>
		</tr>
	</table>
	


	
	
</body>
</html>