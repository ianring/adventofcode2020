<?php


$input = file_get_contents('input.txt');
// $input = file_get_contents('test.txt');
// $input = file_get_contents('test2.txt');
// $input = file_get_contents('test3.txt');

$lines = explode("\n\n", $input);

$howmanyvalid = 0;
foreach($lines as $line) {

	$props = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);

	// print_r($props);

	$arr = array();
	foreach($props as $prop) {
		list($propname, $propval) = explode(':',$prop);
		$arr[trim($propname)] = trim($propval);
	}

	if (isValid($arr)) {
		$howmanyvalid++;		
	}

}


function isValid($p) {
	foreach(array('byr','iyr','eyr','hgt','hcl','ecl','pid') as $r) {
		if (!array_key_exists($r, $p)) {
			// echo 'invalid: missing prop '.$r;
			// echo "\n";
			return false;
		}
	}

	if ($p['byr'] < 1920 || $p['byr'] > 2002) {
		// echo 'invalid: byr '.$p['byr'];
		// echo "\n";
		return false;
	}

	if ($p['iyr'] < 2010 || $p['iyr'] > 2020) {
		// echo 'invalid: iyr '.$p['iyr'];
		// echo "\n";
		return false;
	}

	if ($p['eyr'] < 2020 || $p['eyr'] > 2030) {
		// echo 'invalid: eyr '.$p['eyr'];
		// echo "\n";
		return false;
	}


	$height = substr($p['hgt'], 0, -2);
	$heightunit = substr($p['hgt'], -2);
	if ($heightunit == 'cm') {
		if ($height < 150 || $height > 193) {
			// echo 'invalid: hgt '.$p['hgt'];
			// echo "\n";
			return false;
		}
	} else if ($heightunit == 'in') {
		if ($height < 59 || $height > 76) {
			// echo 'invalid: hgt '.$p['hgt'];
			// echo "\n";
			return false;
		}
	} else {
		// echo 'invalid: hgt unit '.$p['hgt'];
		// echo "\n";			
		return false;
	}

	if (preg_match('/#([0-9a-f]{6})/', $p['hcl']) !== 1) {
		// echo 'invalid: hcl '.$p['hcl'];
		echo "\n";
		return false;
	}

	if (!in_array($p['ecl'], array('amb','blu','brn','gry','grn','hzl','oth'))) {
		// echo 'invalid: ecl '.$p['ecl'];
		// echo "\n";
		return false;
	}

	if (preg_match('/[0-9]{9}/', $p['pid']) !== 1) {
		// echo 'invalid: pid '.$p['pid'];
		// echo "\n";
		return false;
	}

	if (strlen($p['pid']) != 9) {
		echo 'invalid: pid '.$p['pid'];
		echo "\n";
		return false;		
	}


	return true;
}



echo "\n";
echo "\n";
echo $howmanyvalid;
echo "\n";
echo "\n";
