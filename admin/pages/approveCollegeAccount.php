<?php
// define variables and set to empty values
session_start();

$collegeID = ($_POST['collegeID']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Connecting to MySQL
	$servername = "localhost";
	$username = "root";
	$dbpassword = "";
	$dbname = "hfm";
	// Create connection
	$conn = new mysqli($servername, $username, $dbpassword, $dbname);

	// Check connection
	if ($conn->connect_error) {	
		die("Database Connection failed: " . $conn->connect_error);
		exit;
	} 
	$flag = false;
	$sql = "SELECT 
		`email`,
		`password`
		FROM `college` WHERE id = '$collegeID'";
	
	$result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_assoc($result)){
	  $flag = true;
	// add each row returned into an array
	  $email = $row['email'];
	  $password = $row['password'];
	}
	if($flag == true){
		$key = 'c' . $collegeID;
		$role = 1;
		$status = 'not_completed';
		$sql = "INSERT INTO `user` (
			`id`, 
			`username`, 
			`password`, 
			`role`,
			`status`
			)  VALUES (
			'".$key."',
			'".$email."',
			'".$password."',
			'".$role."',
			'".$status."'
			)"; 
		if ($conn->query($sql) === TRUE) {
			$status = 'not_completed';
			$sql = 
				"UPDATE `college` 
				SET 
				`status`='".$status."'
				WHERE id = $collegeID";
			if ($conn->query($sql) === TRUE) {
				echo '<div class="alert alert-success" role="alert">
					Successfully approved the college account!
				  </div><br/>';
				 exit;
			}else{
				echo '<div class="alert alert-danger" role="alert">
					Error occurred while updating college table
				  </div><br/>';
			}
		}
		else {
			if(($conn->errno) == 1062){
				echo '<div class="alert alert-danger" role="alert">
					Unique key violation error while creating College Account
				  </div><br/>';
			}else{
				echo '<div class="alert alert-danger" role="alert">
					An error occurred while creating questions table. Please contact admin with this error
				  </div><br/>';
			}
		//header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
		}

		$conn->close();
	}else{
		echo '<div class="alert alert-danger" role="alert">
			An error occurred while fetching college details
		  </div><br/>';
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
