<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TEST</title>
	</head>
	<body><form></form>
	
		<?php

		// 註解的用法
		
		/* 
		多行
		可以這樣
		用喔
		*/
		
		/*
	$number1 = 20;

		function local()
		{
			$number2 = 30;
			global $number1;
			echo "函數中\$number1 = $number1";
			echo "<br>";
			echo "函數中\$number2 = $number2";
			echo "<br>";
		}
		
		local();
		
		echo "函數外\$number1 = $number1";
		echo "<br>";
		echo "函數外\$number2 = $number2";
		echo "<br";
		
		$num1 = 100;
		echo "得分".$num1."分";
		*/
		$a = "Hi";
		echo '$a = "$a"';
		
		$name="周杰倫";
		$price=400;
		$goods="衣服";
		
		echo "<br>";
		echo $name."花了\$"."<img src=\"https://s.yimg.com/cv/apiv2/twfrontpage/logo/Yahoo-TW-desktop-FP@2x.png\">".$price."元, 買了一件".$goods;
		echo "<br>";
		//echo "$name 花了$price.元, 買了一件$goods";		
		echo "<br>";
		echo '<img src="https://s.yimg.com/cv/apiv2/twfrontpage/logo/Yahoo-TW-desktop-FP@2x.png">';
		echo "<img src=\"https://s.yimg.com/cv/apiv2/twfrontpage/logo/Yahoo-TW-desktop-FP@2x.png\">";
		echo '<br>';
		echo sprintf("%s花了\$%d元, 買了一件%s", $name, $price, $goods);
		
		for ($x = 0; $x <= 10; $x++) {
  			echo "The number is: $x <br>";
		}
		
		for ($i =0; $i <= 100; $i++) {
			echo "You added".$i."!"."<br>";
		}
		
		?>
	</body>
</html>
