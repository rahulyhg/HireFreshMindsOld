<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loginID = (string)$_SESSION['login_id'];
	$tableName = $loginID . 'a' . $_POST['assessmentID'] . '_questions';
	$assessmentID = $_POST['assessmentID'];
}else{
	session_destroy();
	header("location: /HFM");
}
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
		`question`, 
		`id`
		FROM `$tableName`";
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $myarray[] = array($row['question'],$row['id'],$assessmentID);
	}
	echo json_encode($myarray);
	exit;
}	
?>
