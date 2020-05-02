<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connection
if (!$conn) {
	die("Connection failed : " .mysqli_connect_error());
}

$sql = "CREATE TABLE coronavirus ( 
	id_coronavirus INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_country INT(11) NOT NULL,
	total_cases INT(30) NOT NULL,
	new_cases INT(30) NOT NULL,
	total_deaths INT(30) NOT NULL,
	new_deaths INT(30) NOT NULL,
	total_recovered INT(30) NOT NULL,
	active_cases INT(30) NOT NULL)";
	
if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error : " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>