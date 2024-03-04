<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>PHP 0129</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
	<style>
		body{
			background-color: <?php
		$color = array ("red", "blue", "yellow", "green", "pink");
		$i = rand(0,4);
		echo $color[$i];
	?>;
		}
	</style>
</head>

<body style="background-color: <?php
		$color = array ("red", "blue", "yellow", "green", "pink");
		$i = rand(0,4);
		echo $color[$i];
	?>">
</body>
</html>
