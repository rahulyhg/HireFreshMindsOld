<?php
// define variables and set to empty values
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$collegeKey = 'c' . $_POST['collegeID'];
	$collegeID = $_POST['collegeID'];
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
	$sql = 
	"DELETE FROM 
	`user` WHERE id = '$collegeKey'";
	//echo $sql;
	//exit;
	//$statement = $conn-> prepare($sql);
		if ($conn->query($sql) === TRUE) {
			$sql = 
			"DELETE FROM 
			`college` WHERE id = '$collegeID'";
			if ($conn->query($sql) === TRUE) {
				echo '<div class="alert alert-success" role="alert">
					Successfully deleted notice item!
				  </div><br/>';
			}else{
				echo '<div class="alert alert-danger" role="alert">
					Unable to remove from entry college table!
				  </div><br/>';
			}
		}else{
			echo '<div class="alert alert-danger" role="alert">
				Unable to remove entry from user table!
			  </div><br/>';
		}
}	
?>
