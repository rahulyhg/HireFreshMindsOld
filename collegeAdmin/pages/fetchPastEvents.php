<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loggedInUserID = $_SESSION['login_id'];
	$tablename = $loggedInUserID . '_events';
}else{
	session_destroy();
	header("location: /HFM");
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
	$today = date("Y/m/d");
	$sql = "SELECT 
		`name`, 
		`type`, 
		`fromDate`,
		`toDate`,	
		`venue`,	
		`contactPerson`
		FROM `$tablename` WHERE fromDate < '$today'";
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $myarray[] = array($row['name'], $row['type'], $row['fromDate'],$row['toDate'],$row['venue'], $row['contactPerson']);
	}
	echo json_encode($myarray);
	exit;
}	
?>
