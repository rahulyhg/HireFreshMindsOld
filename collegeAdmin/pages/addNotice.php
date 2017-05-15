<?php
// define variables and set to empty values
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
session_start();

$loginID = (string)$_SESSION['login_id'];
$tableName = $loginID . '_noticeboard';

$title = test_input($_POST['title']);
$date = date('Y-m-d',strtotime($_POST['date']));
$time = ($_POST['time']);
$brief = ($_POST['brief']);
$statuss = ($_POST['statuss']);

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
		die("Connection failed: " . $conn->connect_error);
	} 
	else {
	// check if name only contains letters and whitespace
		$sql = "INSERT INTO `$tableName` (
		`title`, 
		`date`, 
		`time`, 
		`brief`,
		`college_id`,		
		`status`		
		)  VALUES (
		
		'".$title."',
		'".$date."',
		'".$time."',
		'".$brief."',
		'".$_SESSION['login_id']."',
		'".$statuss."'
		)"; 
		if ($conn->query($sql) === TRUE) {
			echo '<div class="alert alert-success" role="alert">
					Successfully added a new Notice item!
				  </div><br/>';
			//header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		} else {
			if(($conn->errno) == 1062){
				echo '<div class="alert alert-danger" role="alert">
					Unexpected error, please try again later
				  </div><br/>';
			}else{
				echo '<div class="alert alert-danger" role="alert">
					Unexpected error, please try again later
				  </div><br/>';
			}
		}
		$conn->close();
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
