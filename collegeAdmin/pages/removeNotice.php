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
	$conn = mysqli_connect($servername, $username, $dbpassword);
	
	// Selecting Database
	$db = mysqli_select_db($conn,$dbname);
	// SQL query to fetch information of registerd users and finds user match.
	//$status = $_POST['status'];	
	$id = (isset($_POST['id']))?$_POST['id']:'';
	if($id == '') {
		echo 'Something is not right!';
	}
	else {
		$sql = 
		"DELETE FROM 
		`$tablename` WHERE id = $id";
		//$statement = $conn-> prepare($sql);
	}
	if ($conn->query($sql) === TRUE) {
		echo '<div class="alert alert-success" role="alert">
			Successfully deleted notice item!
		  </div><br/>';
	}
}	
?>
