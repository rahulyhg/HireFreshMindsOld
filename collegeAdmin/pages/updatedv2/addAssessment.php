<?php
// define variables and set to empty values
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
session_start();

$loginID = (string)$_SESSION['login_id'];
$tableName = $loginID . '_assessments';

$name = ($_POST['name']);
$duration = ($_POST['duration']);
$fromDate = date('Y-m-d',strtotime($_POST['fromDate']));
$toDate =  date('Y-m-d',strtotime($_POST['toDate']));
$questionCount = ($_POST['questionCount']);

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
	$role = 1;
	$sql = "INSERT INTO `$tableName` (
	`name`, 
	`duration`, 
	`fromDate`, 
	`toDate`,
	`questionCount`
	)  VALUES (
	'".$name."',
	'".$duration."',
	'".$fromDate."',
	'".$toDate."',
	'".$questionCount."'
	)"; 
	if ($conn->query($sql) === TRUE) {
		//C38Q
		$last_id = $conn->insert_id;
		$questionsTable = $loginID . 'A' . $last_id . '_questions';
		$sql=
		"CREATE 
		TABLE IF NOT EXISTS `hfm`. `$questionsTable`
		( 
		`question` VARCHAR(100) NOT NULL , 
		`option1` VARCHAR(50) NOT NULL , 
		`option2` VARCHAR(50) NOT NULL , 
		`option3` VARCHAR(50) NOT NULL , 
		`option4` VARCHAR(50) NOT NULL , 
		`id` INT PRIMARY KEY 
		)";
		if($conn->query($sql) === TRUE){
			echo '<div class="alert alert-success" role="alert">
				Successfully scheduled a new assessment!
			  </div><br/>';
		}
		else {
			if(($conn->errno) == 1062){
				echo '<div class="alert alert-danger" role="alert">
					Unique key violation error while creating Questions table
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
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
