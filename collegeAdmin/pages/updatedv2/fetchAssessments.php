<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loggedInUserID = $_SESSION['login_id'];
	$tablename = $loggedInUserID . '_assessments';
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
	if($_GET['status'] == 'running'){
		$sql = "SELECT 
		`id`,
		`name`, 
		`duration`, 
		`fromDate`,
		`toDate`,	
		`questionCount`
		FROM `$tablename` WHERE fromDate <'$today' or toDate >= '$today'";
	}else{
		if($_GET['status'] == 'archived'){
			$sql = "SELECT 
			`id`,
			`name`, 
			`duration`, 
			`fromDate`,
			`toDate`,	
			`questionCount`
			FROM `$tablename` WHERE fromDate < '$today' and toDate < '$today'";
		}
	}
	
	
	$result = mysqli_query($connection,$sql);

	$myarray = array();
	//$result = mysqli_query($connection,$sql);

	while($row = mysqli_fetch_assoc($result)){
	// add each row returned into an array
	  $id = $row['id'];
	  $str = "<a href=\"#\" onclick=\"assessmentEditQuestion($id);\" data-toggle=\"button\">Edit</a><span> / </span><a href=\"#\" onclick=\"assessmentAddQuestion($id);\" data-toggle=\"button\">Add Question</a>";
	  $myarray[] = array($row['name'], $row['duration'], $row['fromDate'],$row['toDate'],$row['questionCount'],$str);
	}
	echo json_encode($myarray);
	exit;
}	
?>
