<?php include("php0205_functions.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	
	<?php

	
	hello();
	?>
	
	<hr>
	
	<?php

		
	mini(1, 5, 10);
	
	echo "最小值為: ".min(1,5,10)."<br>";
	?>
	
	<hr>
	
	<?php

	
	$a = 5;
	$b = 8;
	echo $a." + ".$b." = ".add(5, 8)."<br>";
	echo $a." - ".$b." = ".sub(5, 8)."<br>";
	echo $a." * ".$b." = ".mul(5, 8)."<br>";
	echo $a." / ".$b." = ".div(5, 8)."<br>";
	
	?>
</body>
</html>