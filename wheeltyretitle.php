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
$asql = "SELECT * FROM aum_t_n_autec_20s ";

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

	$carmodel =strlen($barecarmodel - 6);


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

if ($lenght >= 81){ 

	$title = substr($pretitle,80);
	
	} elseif (($lenght >= 75) && ($lenght <= 80)) {
	
	$title = $pretitlef.'FIT '.$cardet;
	
	} elseif (($lenght >= 73) && ($lenght <= 74)) {
	
	$title = $pretitlef.'FITS '.$cardet;
	
	} elseif (($lenght >= 75) && ($lenght <= 72)) {
	
	$title = $pretitlef.'& TYRES '.$cardet;
	
	}
	
	else {
	
	$title = $pretitlef.' '.$cardet;
	
	}
	
	$ntlen = strlen($title);

	echo $title.'---'.$lenght.'>>>'.$ntlen.'<br />';

};

$conn->close();

?>

