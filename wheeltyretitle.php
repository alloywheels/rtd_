<?php

//connection LOL
$servername = "localhost";
$username = "root";
$password = ""; // ;D
$dbname = "wheels";



//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}	
echo "Connected successfully".'<br />';	



//query for all
$asql = "SELECT * FROM mom_t_nankang ";

$aresult = $conn->query($asql);

//collecting necessary variables
while($row = $aresult->fetch_assoc()){
//rim size - from SIZE
$rimsize = $row["SIZE"];

	//rim diameter
	$rimdiameter = substr($rimsize, -2);
	//rim width 
		//find position of x
		$xpos = strpos($rimsize,"x");

		$rimwidth = substr($rimsize, 0,$xpos);

//rim offset - from OFFSET
$rimoffset = $row["OFFSET"];

//rim pcd - from PCD
$rimpcd = $row["PCD"];

//rim colour - need separate colour function for that
$rimcolour = $row["COLOUR"]; //for now b4 function

require('colourfunction.php');


//rim brand - from BRAND
$rimbrand = $row["BRAND"];

//rim model -from NAME
$rimmodel = $row["NAME"];


//car - from CAR
$car = $row["CAR"];

//car model - from MODEL
$barecarmodel = $row["MODEL"];

	$carm = strlen($barecarmodel);
	$carmodel = substr($barecarmodel,0,$carm - 5);

	//separate age 
	//car age - from MODEL
		$carage = substr($barecarmodel,-5);



//tyre details - from BestFitTyres
$bestfittyre = $row["BestFitTyres"];
$bestfittyre = $bestfittyre.' ';

//pretitle first

$pretitlef = $rimdiameter.'" '.$rimbrand.' '.$rimmodel.' '.$codecolour.' '.$rimwidth.'J'.' '.'ET'.$rimoffset.' '.$rimpcd.' ';

$flenght = strlen($pretitlef);

//car details
$cardet = $car.' '.$carmodel.' '.$carage;

$clenght = strlen($cardet);

//-------------- alloys etc words
$aw = "ALLOY WHEELS";

$rim = "RIMS";

$ts = "TYRES";

$pretitle = $pretitlef.' '.$cardet;

$lenght = strlen($pretitle);

//----
//echo $pretitle.'---'.$lenght.'<br />';
//----

if ($lenght > 80){ 

	$title = substr($pretitle,0,80); // 0 characters >>> 80
	
	} elseif (($lenght >= 79) && ($lenght <= 80)) { // 0 characters >>> 80
	
	$title = $pretitle; 
	
	} elseif ($lenght == 78) { // 2 characters >>> 78
	
	$title = $pretitlef.'> '.$cardet; 
	
	} elseif ($lenght == 77) { // 3 characters >>> 77
	
	$title = $pretitlef.'-> '.$cardet;
	
	} elseif ($lenght == 76) { // 4 characters >>> 76
	
	$title = $pretitlef.'FIT '.$cardet;
	
	} elseif ($lenght == 75) { // 5 characters >>> 75
	
	$title = $pretitlef.'FITS '.$cardet;
	
	} elseif ($lenght == 74) { // 6 characters >>> 74
	
	$title = $pretitlef.'FIT > '.$cardet;
	
	} elseif ($lenght == 73) { // 7 characters >>> 73
	
	$title = $pretitlef.'FIT -> '.$cardet;
	
	} elseif ($lenght == 72) { // 8 characters >>> 72
	
	$title = $pretitlef.'FITS -> '.$cardet;
	
	} elseif ($lenght == 71) { // 9 characters >>> 71
	
	$title = $pretitlef.'FITS --> '.$cardet;
	
	} elseif ($lenght == 70) { // 10 characters >>> 70
	
	$title = $pretitlef.'& TYRES > '.$cardet;
	
	} elseif ($lenght == 69) { // 11 characters >>> 69
	
	$title = $pretitlef.'& TYRES -> '.$cardet;
	
	} elseif ($lenght == 68) { // 12 characters >>> 68
	
	$title = $pretitlef.'& TYRES FIT '.$cardet;
	
	} elseif ($lenght == 67) { // 13 characters >>> 67
	
	$title = $pretitlef.'& TYRES FITS '.$cardet;
	
	} elseif ($lenght == 66) { // 14 characters >>> 66
	
	$title = $pretitlef.'& TYRES FIT > '.$cardet;
	
	} elseif ($lenght == 65) { // 15 characters >>> 65
	
	$title = $pretitlef.'& TYRES FIT -> '.$cardet;
	
	} elseif ($lenght == 64) { // 16 characters >>> 64
	
	$title = $pretitlef.'& TYRES FITS -> '.$cardet;
	
	} elseif ($lenght == 63) { // 17 characters >>> 63
	
	$title = $pretitlef.'AND TYRES FITS > '.$cardet;
	
	} elseif ($lenght == 62) { // 18 characters >>> 62
	
	$title = $pretitlef.'AND TYRES FITS -> '.$cardet;
	
	} elseif ($lenght == 61) { // 19 characters >>> 61
	
	$title = $pretitlef.'& '.$bestfittyre.'TYRES- '.$cardet;
	
	} elseif ($lenght == 60) { // 20 characters >>> 60
	
	$title = $pretitlef.'& '.$bestfittyre.'TYRES > '.$cardet;
	
	} elseif ($lenght == 59) { // 21 characters >>> 59
	
	$title = $pretitlef.'& '.$bestfittyre.'TYRES -> '.$cardet;
	
	} elseif ($lenght == 58) { // 22 characters >>> 58
	
	$title = $pretitlef.'& '.$bestfittyre.'TYRES FIT '.$cardet;
	
	} elseif ($lenght == 57) { // 23 characters >>> 57
	
	$title = $pretitlef.'AND '.$bestfittyre.'TYRES -> '.$cardet;
	
	} elseif ($lenght == 56) { // 24 characters >>> 56
	
	$title = $pretitlef.'AND '.$bestfittyre.'TYRES FIT '.$cardet;
	
	} elseif ($lenght == 55) { // 25 characters >>> 55
	
	$title = $pretitlef.'AND '.$bestfittyre.'TYRES FITS '.$cardet;
	
	} elseif ($lenght == 54) { // 26 characters >>> 54
	
	$title = $pretitlef.'RIMS AND '.$bestfittyre.'TYRES- '.$cardet;
	
	} elseif ($lenght == 53) { // 27 characters >>> 53
	
	$title = $pretitlef.'RIMS AND '.$bestfittyre.'TYRES > '.$cardet;
	
	} elseif ($lenght == 52) { // 28 characters >>> 52
	
	$title = $pretitlef.'RIMS AND '.$bestfittyre.'TYRES -> '.$cardet;
	
	} elseif ($lenght == 51) { // 29 characters >>> 51
	
	$title = $pretitlef.'RIMS AND '.$bestfittyre.'TYRES FIT '.$cardet;
	
	} elseif ($lenght == 50) { // 30 characters >>> 50
	
	$title = $pretitlef.'RIMS AND '.$bestfittyre.'TYRES FITS '.$cardet;
	
	} elseif ($lenght == 49) { // 31 characters >>> 49
	
	$title = $pretitlef.'WHEELS AND '.$bestfittyre.'TYRES FIT '.$cardet;
	
	} elseif ($lenght == 48) { // 32 characters >>> 48
	
	$title = $pretitlef.'WHEELS AND '.$bestfittyre.'TYRES FITS '.$cardet;
	
	} elseif (($lenght >= 46) && ($lenght <= 47)) { // 33-34 characters >>> 46-47
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES '.$cardet;
	
	} elseif ($lenght == 45) { // 35 characters >>> 45
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES - '.$cardet;
	
	} elseif ($lenght == 44) { // 36 characters >>> 44
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES -> '.$cardet;
	
	} elseif ($lenght == 43) { // 37 characters >>> 43
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES FIT '.$cardet;
	
	} elseif ($lenght == 42) { // 38 characters >>> 42
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES FITS '.$cardet;
	
	} elseif ($lenght == 41) { // 39 characters >>> 41
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES FIT > '.$cardet;
	
	} elseif ($lenght == 40) { // 40 characters >>> 40
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES FIT -> '.$cardet;
	
	} elseif ($lenght == 39) { // 41 characters >>> 39
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.'TYRES FITS -> '.$cardet;
	
	} 
	
	else {
	
	$title = $pretitlef.' '.$cardet;
	
	}
	
	$ntlen = strlen($title);

	echo $title.'---'.$lenght.'>>>'.$ntlen.'<br />';

};

$conn->close();

?>

