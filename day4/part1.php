<?php


$input = file_get_contents('input.txt');
// $input = file_get_contents('test.txt');

$lines = explode("\n\n", $input);

$howmanyvalid = 0;
foreach($lines as $line) {

	$props = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);

	print_r($props);

	$arr = array();
	foreach($props as $prop) {
		list($propname, $propval) = explode(':',$prop);
		$arr[$propname] = $propval;
	}

	$required = array(
		'byr',
		'iyr',
		'eyr',
		'hgt',
		'hcl',
		'ecl',
		'pid',
		// 'cid'
	);

	$isvalid = true;
	foreach($required as $r) {
		if (!array_key_exists($r, $arr)) {
			echo 'invalid';
			echo "\n";
			$isvalid = false;
		}
	}

	if ($isvalid) {
		$howmanyvalid++;		
	}

}

echo $howmanyvalid;