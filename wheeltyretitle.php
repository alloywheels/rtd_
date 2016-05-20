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
$asql = "SELECT * FROM aum_t_n_diewew_15_19_20_22 ";

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
	
	} elseif (($lenght >= 77) && ($lenght <= 80)) { // 0 characters >>> 80
	
	$title = $pretitle; 
	
	} elseif ($lenght == 76) { // 4 characters >>> 76
	
	$title = $pretitlef.'FIT '.$cardet; 
	
	} elseif (($lenght >= 69) && ($lenght <= 75)) { // 5 characters >>> 75
	
	$title = $pretitlef.'FITS '.$cardet;
	
	} elseif (($lenght >= 67) && ($lenght <= 68)) { // 12 characters >>> 68
	
	$title = $pretitlef.'& TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 61) && ($lenght <= 66)) { // 14 characters >>> 66
	
	$title = $pretitlef.'AND TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 53) && ($lenght <= 60)) {  // 20 characters >>> 60
	
	$title = $pretitlef.$bestfittyre.' TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 48) && ($lenght <= 52)) {  // 28 characters >>> 52
	
	$title = $pretitlef.'AND '.$bestfittyre.' TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 44) && ($lenght <= 47)) {  // 33 characters >>> 47
	
	$title = $pretitlef.' RIMS AND'.$bestfittyre.' TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 42) && ($lenght <= 43)) {  // 37 characters >>> 43
	
	$title = $pretitlef.' WHEELS AND '.$bestfittyre.' TYRES FIT '.$cardet;
	
	} elseif (($lenght >= 20) && ($lenght <= 41)) {  // 39 characters >>> 41
	
	$title = $pretitlef.'ALLOY WHEELS AND '.$bestfittyre.' TYRES FIT '.$cardet;
	
	} 
	
	else {
	
	$title = $pretitlef.' '.$cardet;
	
	}
	
	$ntlen = strlen($title);

	echo $title.'---'.$lenght.'>>>'.$ntlen.'<br />';

};

$conn->close();

?>

