<?php


$input = file_get_contents('input.txt');
// $input = file_get_contents('test.txt');

$lines = explode("\n", $input);

$treecount = 0;

$tests = array(
	array(
		'across' => 1,
		'down' => 1
	),
	array(
		'across' => 3,
		'down' => 1
	),
	array(
		'across' => 5,
		'down' => 1
	),
	array(
		'across' => 7,
		'down' => 1
	),
	array(
		'across' => 1,
		'down' => 2
	)
);

$product = 1;
foreach($tests as $test) {
	$result = intval(counttrees($lines, $test['across'], $test['down']));
	echo "$result \n\n";
	echo (intval($result) * intval($product));

	$product *= intval($result);
	echo "product $product \n\n";

}
echo "$product \n\n";



function counttrees($lines, $slopeacross, $slopedown) {
	$treecount = 0;
	$ypos = 0;
	for($i=0; $i<count($lines); $i = $i + $slopedown) {
		// echo $lines[$i];
		// echo "\n";

		$thisline = $lines[$i];
		$width = strlen($thisline);
		$ypos = (($i/$slopedown) * $slopeacross) % $width;

		// echo $ypos . "\n";
		if (substr($thisline, $ypos, 1) == '#') {
			// echo "tree \n";
			$treecount++;
		} else {
			// echo "O \n";
		}
	}

	// echo "\n\n".$treecount."\n";
	return $treecount;
}

