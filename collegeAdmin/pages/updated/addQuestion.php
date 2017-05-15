<?php
// define variables and set to empty values
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
session_start();

$loginID = (string)$_SESSION['login_id'];
$tableName = $loginID . 'a' . $_POST['assessmentID'] . '_questions';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$assessmentID = $_POST['assessmentID'];
	$question = $_POST['question'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 = $_POST['option3'];
	$option4 = $_POST['option4'];
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
		`question`, 
		`option1`, 
		`option2`, 
		`option3`,
		`option4`	
		)  VALUES (
		
		'".$question."',
		'".$option1."',
		'".$option2."',
		'".$option3."',
		'".$option4."'
		)"; 
		if ($conn->query($sql) === TRUE) {
			echo '<div class="alert alert-success" role="alert">
					Successfully added a new Question to the Assessment!
				  </div><br/>';
			//header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		} else {
			if(($conn->errno) == 1062){
				echo '<div class="alert alert-danger" role="alert">
					Unique key violation. Please contact admin with this error.
				  </div><br/>';
			}else{
				echo '<div class="alert alert-danger" role="alert">
					Unexpected error, please try again later. Please contact admin
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
