<?php


$input = file_get_contents('input.txt');
// $input = file_get_contents('test.txt');

$lines = explode("\n", $input);

// $lines = array('FBFBBFFRLR');


// $lines = array('FFFFFFFRLR');

$all = array_fill_keys(range(0,963), true);
print_r($all);

$maxid = 0;
foreach($lines as $line) {

	$rowpart = substr($line, 0, 7);
	$colpart = substr($line, 7, 9);

	$rowpart = str_replace('F', '0', $rowpart);
	$rowpart = str_replace('B', '1', $rowpart);

	$colpart = str_replace('L', '0', $colpart);
	$colpart = str_replace('R', '1', $colpart);


	// echo "row: $rowpart \n";
	$row = bindec($rowpart);
	// echo "row: $row \n";

	// echo "col: $colpart \n";
	$col = bindec($colpart);
	// echo "col: $col \n";

	$id = ($row * 8) + $col;
	// echo "id: $id \n";
	$maxid = max($maxid, $id);
	$all[$id] = false;
}

echo "\n\n";
echo $maxid;
echo "\n\n";


ksort($seats);
print_r($all);