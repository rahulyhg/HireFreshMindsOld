<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loggedInUserID = $_SESSION['login_id'];
	$tablename = $loggedInUserID . '_noticeboard';
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
	$status = $_POST['status'];	
	$filter = (isset($_POST['filter']))?$_POST['filter']:'';
	$id = (isset($_POST['id']))?$_POST['id']:'';
	if($filter != ''){ //Filter is for same day noticeboard generation i.e in dashboard
		$date = date("Y/m/d");
		$sql = "SELECT 
		`id`,
		`title`, 
		`date`, 
		`time`,
		`brief`
		FROM `$tablename` WHERE status = '$status' AND date='$date'";
	}
	else{
		if($id != '') { //To fetch particular notice item i.e to modify item
			$sql = "SELECT 
				`id`, 
				`title`, 
				`date`, 
				`time`, 
				`brief`
				FROM `$tablename` WHERE id = '$id'";
		}
		else {
			$sql = "SELECT 
				`id`, 
				`title`, 
				`date`, 
				`time`, 
				`brief`
				FROM `$tablename` WHERE status = '$status'";
		}
	}
	$result = mysqli_query($connection,$sql);

	if(($connection->errno) == 1146){
		echo 'newUser';
		exit;
	}
	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $myarray[] = array($row['id'], $row['title'], $row['date'],$row['time'], $row['brief']);
	}
	echo json_encode($myarray);
	exit;
}	
?>
