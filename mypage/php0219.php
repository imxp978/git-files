<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	<?php
		$sum = 9;
		function fun(&$sum){
			return $sum+=1;
		}
		fun ($sum);
		echo "取值\$sum: ".$sum. "<br>";
		fun ($sum);
		echo "取址\$sum: ".$sum;
	?>
	<br>
	<?php
		function fun2($a=5, $b=10) {
			return $a+$b;
		}
		$add = 'fun2';
		echo $add."<br>";
		echo $add(4,6)."<br>";
	?>
	
</body>
</html>