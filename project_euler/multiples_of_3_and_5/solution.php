<?php
//Find the sum of all the multiples of 3 or 5 below 1000.

//Takes  5.6099891662598E-7 sec for PHP
$sum = 0;
for ($x = 1; $x <= 999; $x++) {
	if ($x % 3 == 0 OR $x % 5 == 0) {
		$sum = $sum + $x; 
	}    
}
echo $sum;

//Takes 1.2435913085937E-5 sec for PHP
$sum = array_sum(array_filter(range(1,999), function($x) {return $x%3 == 0 || $x%5 == 0; }));
echo $sum;
?>