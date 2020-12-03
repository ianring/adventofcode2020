<?php
$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

foreach($lines as $a) {
	foreach($lines as $b) {
		foreach($lines as $c) {
			if ($a + $b + $c == 2020) {
				echo "$a $b $c";
				echo "\n";
				echo $a * $b * $c;
				echo "\n";
			}
		}
	}
}