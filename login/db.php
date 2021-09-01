<?php
 


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "desre";




// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	echo "<h1> Database Connection failed. </h1>";
    die("Connection failed: " . mysqli_connect_error());
}else{
	//echo "<h1> Database Connecteted </h1>";
}
