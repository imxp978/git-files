<?php
	
		
	function hello() {
		echo "hello world!<br>";
	}


	function mini($a, $b, $c) {
		echo "最小值為: ";
		if (($a < $b) && ($a < $c)) {
			echo $a;
		} elseif (($b < $a) && ($b < $c)) {
			echo $b;
		} elseif (($c < $a) && ($c < $b)) {
			echo $c;
		}
		echo "<br>";
	}



	function add($x, $y) {
		return $x + $y;
	}
	
	function sub($x, $y) {
		return $x - $y;
	}
	
	function mul($x, $y) {
		return $x * $y;
	}
	
	function div($x, $y) {
		return $x / $y;
	}

?>