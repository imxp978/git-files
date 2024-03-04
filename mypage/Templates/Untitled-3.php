<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 0129</title>
<style>
	p{
		background-color: white;
	}
	
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
	?>"
	  >
	<p>
		<?php
			print_r($color);

			$num=array(1,2,3,4,5);
		?>
	</p>
	<p>
		<?php
			$score = array (80, 90, 60, 100, 50);
			$sum = 0;
			foreach($score as $i){
				$sum = $sum + $i;
			}
			$avg = $sum / count($score);
			echo "總分: ".$sum."<br>平均: ".$avg;
		?>
	</p>
	<p>
		<?php
			$test = array("a" => array(1, 2, 5, 10),"b","c","d","e");
			echo "without mode=1: ".count($test)."<br>";
			echo "with mode=1:".count($test, 1)."<br>";
		
			foreach($test as $i){
				echo $i."<br>";
			}
		?>
	</p>
	<p>
		<?php
			session_start();
			if ( isset($_SESSION['visit']) == true){
				$_SESSION['visit'] = $_SESSION['visit'] + 1;
			}
			else {
				$_SESSION['visit'] = 1;
			}
			echo "歡迎您第".$_SESSION['visit']."次造訪";
		?>
	</p>
	<p>
		<?php
			session_start();
			if ( !isset($_SESSION['visit2'])){
				$_SESSION['visit2'] = 1;
			}
			else {
				$_SESSION['visit2']++;
			}
			echo "歡迎您第".$_SESSION['visit2']."次造訪";
		?>
	</p>
	
	<p>
		<?php
		
		?>
	</p>
	
</body>
</html>