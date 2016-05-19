<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wheels";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}	
echo "Connected successfully";	

?>
