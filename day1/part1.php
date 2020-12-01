<?php
$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

foreach($lines as $line) {
	$int = intval($line);

	$diff = 2020 - $line;
	if (array_search($diff, $lines)) {
		echo $int . ' + ' . $diff;
		echo "\n";
		echo $int * $diff;
		echo "\n";
	}

}