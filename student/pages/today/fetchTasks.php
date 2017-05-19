<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loginID = (string)$_SESSION['login_id'];
	$tableName = $loginID . '_tasks';
	$tableName = 's8';
}else{
	session_destroy();
	header("location: /HFM");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$status = $_POST['status'];
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
		`task`, 
		`status`, 
		`id`
		FROM `$tableName` WHERE status= '$status'";
	
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $myarray[] = array($row['task'],$row['id']);
	}
	echo json_encode($myarray);
	exit;
}	
?>
