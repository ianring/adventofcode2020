<?php


$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

$treecount = 0;

counttrees($lines);


function counttrees($lines) {
	$treecount = 0;
	for($i=0;$i<count($lines);$i++) {
		echo $lines[$i];
		echo "\n";

		$thisline = $lines[$i];
		$width = strlen($thisline);
		$ypos = ($i * 3) % $width;

		echo $ypos . "\n";
		if (substr($thisline, $ypos, 1) == '#') {
			echo "tree \n";
			$treecount++;
		} else {
			echo "O \n";
		}
	}

	echo "\n\n".$treecount."\n";
}

