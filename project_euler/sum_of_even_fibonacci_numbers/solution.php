<?php
$sumOfEven = 0;
for ($first = 1, $second = 1, $sum = 0, $x = 0; $sum <= 4000000; $x++) {
	$sum = $first + $second;
	$first = $second;
	$second = $sum;
	if($sum % 2 == 0) { 
		$sumOfEven = $sumOfEven + $sum;
	}
}
echo $sumOfEven;
?>