<?php


$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

$howmanyaregood = 0;
foreach($lines as $line) {
	list($left, $right) = explode(':',$line);
	list($range, $letter) = explode(' ', $left);
	$password = trim($right);
	list($min, $max) = explode('-', $range);

	echo "$min $max $letter $password \n";

	$count = substr_count($password, $letter);
	if ($count >= $min && $count <= $max) {
		$howmanyaregood++;
	}
}
echo "\n\n\n"
echo $howmanyaregood;