<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Connecting to MySQL
	$servername = "localhost";
	$username = "root";
	$dbpassword = "";
	$dbname = "hfm";
	// Create connection
	$connection = mysqli_connect($servername, $username, $dbpassword);
	
	// Selecting Database
	$db = mysqli_select_db($connection,$dbname);
	// SQL query to fetch information of registerd users and finds user match.
	$sql = "SELECT 
		`collegeName`	
		FROM `college`";
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $myarray[] = $row['collegeName'];
	}
	echo json_encode($myarray);
	exit;
}
?>
