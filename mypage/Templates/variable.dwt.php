<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>無標題文件</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
	<style>
		body{
			background-color:black;
			color: lightgray;
			font-family: sans-serif;
		}
		body {
			font-size: 16px;
		}
    body,td,th {
	font-size: 16px;
}
    </style>
</head>

<body>
<?php
		$M = "Mcdonalds";
		$KFC = "Kentucky Fried Chicken";
		$store = "M";
		
		echo "\$M = \"Mcdonalds\"; <br>
		\$KFC = \"Kentucky Fried Chicken\"; <br>
		\$store = \"M\"; <br><hr>";

		echo '$M = "Mcdonalds"; <br>
		$KFC = "Kentucky Fried Chicken"; <br>
		$store = "M" ; <br> <hr>';
	
	
	
		$store = "KFC";
		echo "1. this is \$\$store ...{$$store}<br>";

		echo "2. this is \$store ...{$store}<br>";

		echo "3. this is \$\$store ...{$$store}<br>";

		echo "4. this is \$M ...{$M} <br> <hr>";
	
	
		function testing() {
			echo "testing testing 1 2 3. <br>";
		}

		testing();
		testing();
	
	
		$number1=50;
		function addition(){
			$number2=20;
			global $number1;
			echo "$number1";
			echo "<br>";
			echo "$number2";
			echo '<br>';
		}
	
		addition();
	
	$GLOBALS['yo']=99;
	function yo(){
		echo "test ".$GLOBALS['yo'];
	}
	
	echo 'outside fo function is '.$GLOBALS['yo'];
	echo "<br>";
	yo();
	echo "<br>";
	
	echo "<p>";
	$name="周杰倫";
	$price=400;
	$good="衣服";
	echo sprintf("<p>%s花了%d元，買了一件%s</p>", $name, $price, $good);
	echo sprintf("%s%s%s", $name, $name, $name);
	echo "<br>";
	
	
	echo "</p>";
	
	
	echo "<table border=\"1\">";
	for ($i=1; $i<=9; $i++){
		echo "<tr>";
		for ($j=1; $j<=9; $j++){
			$a = $i*$j;
			echo "<td>";
			if ($a < 10) {
				echo $j."*".$i." = 0".$a."  "; 
			}
			else {
				echo $j."*".$i." = ".$a."  ";
			}
			echo "</td>";
			}
		echo "</tr>";
	}
	echo "</table>";
	
	
	
	echo "<p>";
	$age = 22;
	
	if ($age >= 18) {
		echo $age."歲，已成年";
	}else {
		echo $age."歲，未成年";
	}
	echo "</p>";
	
	echo "<p>";
	date_default_timezone_set("asia/taipei"); //backend timezone setting
	
	echo date('Y/m/d H:i:s')."<br>";
	
	$day = date("w");	
	if ($day == 1) {
		echo "今天是星期一，猴子穿新衣";
	} elseif ($day == 2) {
		echo "今天是星期二，猴子穿新衣";
	} elseif ($day == 3) {
		echo "今天是星期三，猴子穿新衣";
	} elseif ($day == 4) {
		echo "今天是星期四，猴子穿新衣";
	} elseif ($day == 5) {
		echo "今天是星期五，猴子穿新衣";
	} elseif ($day == 6 ) {
		echo "今天是星期六，猴子穿新衣";
	} else {
		echo "今天是星期七，猴子穿新衣";
	}
	echo "</p>";
	
	echo "<p>"; // TYPE I
	$month=1;
	switch($month) {
		case($month==1 || $month==2 || $month==12):
			echo $month."月是冬天";
			break;
		case($month==3 || $month==4 || $month==5):
			echo $month."月是春天";
			break;
		case($month==6 || $month==7 || $month==8):
			echo $month."月是夏天";
			break;
		case($month==9 || $month==10 || $month==11):
			echo $month."月是秋天";
			break;
	}
	echo "</p>";
	
	echo "<p>"; // TYPE II
	$month=11;
	switch($month) {
		case($month==1 || $month==2 || $month==12):
			echo $month."月是冬天";
			break;
		case(3<=$month && $month<=5):
			echo $month."月是春天";
			break;
		case(6<=$month && $month<=8):
			echo $month."月是夏天";
			break;
		case(9<=$month && $month<=11):
			echo $month."月是秋天";
			break;
	}
	echo "</p>";
	
	echo "<p>"; //TYPE III
	$month=9;
	switch($month) {
		case 12: // no break so continue
		case 1:  // likewise
		case 2:
			echo $month."月是冬天";
			break;
		case 3:
		case 4:
		case 5:
			echo $month."月是春天";
			break;
		case 6:
		case 7:
		case 8:
			echo $month."月是夏天";
			break;
		case 9:
		case 10:
		case 11:
			echo $month."月是秋天";
			break;
		default:
			echo "error";
	}
	echo "</p><hr>";
	
	echo "<p>"."<b>1~200間可被7及9整除的數有:</b><br>";
	for ($i=1; $i<=200; $i++){
		if ($i%7==0 && $i%9==0){
		echo $i."<br>";
		}  
	}
	echo "</p><hr>";
	
	echo "<p>";

	
	$j=0;
	do {
		$i=rand(0,10);
		$j = $j+$i;
		echo "抽中".$i."元,累積".$j."元"."<br>";
	}while ($i != 0)
	
	?>
	
	<?php 
	echo "<hr>";
	
	
	$i=rand(0,10);
	$j=$i;
	echo "抽中".$i."元，累積".$j."元"."<br>";
	while ($i != 0){
		$i=rand(0,10);
		$j=$j+$i;
		echo "抽中".$i."元，累積".$j."元"."<br>";
	}
	
	?>
	
	<?php
	
	
	
	?>
		

</body>
</html>
