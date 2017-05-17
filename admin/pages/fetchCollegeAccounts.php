<?php
// define variables and set to empty values
session_start();
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
	if($_GET['status'] == 'not_completed'){
		$sql = "SELECT 
		`id`,
		`email`,
		`phone`, 
		`collegeName`, 
		`website`
		FROM `college` WHERE status = ''";
	}else{
		if($_GET['status'] == 'completed'){
			$sql = "SELECT 
			`id`,
			`email`,
			`phone`, 
			`collegeName`, 
			`website`
			FROM `college` WHERE status != ''";
		}
	}
	
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $id = $row['id'];
	  if($_GET['status'] == 'not_completed'){
		$str = "<a href=\"#\" onclick=\"approveAccount($id);\" data-toggle=\"button\">Approve</a><span> / </span><a href=\"#\" onclick=\"rejectAccount($id);\" data-toggle=\"button\">Reject</a>";
	  }else{
		$str = "<a href=\"#\" onclick=\"removeAccount($id);\" data-toggle=\"button\">Remove Account</a><span>";
	  }
	  $myarray[] = array($row['email'], $row['phone'], $row['collegeName'],$row['website'],$str);
	}
	echo json_encode($myarray);
	exit;
}	
?>
