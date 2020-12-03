<?php


$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

$howmanyaregood = 0;
foreach($lines as $line) {
	list($left, $right) = explode(':',$line);
	list($range, $letter) = explode(' ', $left);
	$password = trim($right);
	list($pos1, $pos2) = explode('-', $range);

	echo "$pos1 $pos2 $letter $password \n";

	$letter1 = substr($password, $pos1-1, 1);
	$letter2 = substr($password, $pos2-1, 1);

	$matches = 0;
	if ($letter1 == $letter) {$matches++;}
	if ($letter2 == $letter) {$matches++;}

	if ($matches == 1) {
		$howmanyaregood++;
	}
}

echo "\n\n\n";
echo $howmanyaregood;
echo "\n\n\n";


