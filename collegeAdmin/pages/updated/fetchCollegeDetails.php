<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
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
		`name`, 
		`email`, 
		`phone`,
		`collegeName`,	
		`collegeDesc`,	
		`collegeAddress`,
		`collegePhone`,
		`coursesOffered`,
		`website`
		FROM `college`
		WHERE `email` = '$loggedInUser'";
	$result = mysqli_query($connection,$sql);
	
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$row=mysqli_fetch_row($result);
		$arr = unserialize($row[7]);
		$ar = array(
			"collegeName" => $row[3],
			"collegeDesc" => $row[4],
			"collegeAddress" => $row[5],
			"collegePhone" => $row[6],
			"coursesOffered" => $arr,
			"collegeEmail" => $row[1]
		);
		echo json_encode($ar);
		exit;
	}	
}
?>
