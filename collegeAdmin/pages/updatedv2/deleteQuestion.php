<?php
// define variables and set to empty values
session_start();
if(isset($_SESSION['login_user'])){
	$loggedInUser = $_SESSION['login_username'];
	$loginID = (string)$_SESSION['login_id'];
	$tableName = $loginID . 'a' . $_POST['assessmentID'] . '_questions';
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
	$questionID = (isset($_POST['questionID']))?$_POST['questionID']:'';
	if($questionID == '') {
		echo 'Something is not right!';
	}
	else {
		$sql = 
		"DELETE FROM 
		`$tableName` WHERE id = $questionID";
		//$statement = $conn-> prepare($sql);
	}
	if ($conn->query($sql) === TRUE) {
		echo '<div class="alert alert-success" role="alert">
			Successfully deleted notice item!
		  </div><br/>';
	}
}	
?>
