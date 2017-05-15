<?php
// define variables and set to empty values
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
session_start();

$loginID = (string)$_SESSION['login_id'];
$tableName = $loginID . '_events';

$name = test_input($_POST['name']);
$type = test_input($_POST['type']);
$fromDate = date('Y-m-d',strtotime($_POST['fromDate']));
$toDate =  date('Y-m-d',strtotime($_POST['toDate']));
$brief = test_input($_POST['brief']);
$eventURL = ($_POST['eventURL']);
$regURL = ($_POST['regURL']);
$collegeWebsite = ($_POST['collegeWebsite']);
$FBLink = ($_POST['FBLink']);
$twitterLink = ($_POST['twitterLink']);
$youtubeLink = ($_POST['youtubeLink']);
$posterLink = ($_POST['posterLink']);
$androidLink = ($_POST['androidLink']);
$brochureLink = ($_POST['brochureLink']);
$venue = ($_POST['venue']);
$contactPerson = ($_POST['contactPerson']);
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
	$role = 1;
	// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$collegeWebsite)) {
		$errors['collegeWebsite'] = 'Invalid website URL';
	}
	else {
	// check if name only contains letters and whitespace
		$sql = "INSERT INTO `$tableName` (
		`name`, 
		`type`, 
		`fromDate`, 
		`toDate`,
		`brief`,		
		`eventURL`,		
		`regURL`,		
		`collegeWebsite`,
		`FBLink`,
		`twitterLink`,
		`youtubeLink`,
		`posterLink`,
		`androidLink`,
		`brochureLink`,
		`venue`,
		`college_id`,
		`contactPerson`
		)  VALUES (
		'".$name."',
		'".$type."',
		'".$fromDate."',
		'".$toDate."',
		'".$brief."',
		'".$eventURL."',
		'".$regURL."',
		'".$collegeWebsite."',
		'".$FBLink."',
		'".$twitterLink."',
		'".$youtubeLink."',
		'".$posterLink."',
		'".$androidLink."',
		'".$brochureLink."',
		'".$venue."',
		'".(integer)$loginID."',
		'".$contactPerson."'
		)"; 
		if ($conn->query($sql) === TRUE) {
			echo '<div class="alert alert-success" role="alert">
					Successfully added a new event!
				  </div><br/>';
			//header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		} else {
			if(($conn->errno) == 1062){
				echo '<p style="color: red;">An account with the Email ID you provided alreasy exists
					  . Please reset your password if you have forgotten.</p>';
			}else{
				echo '<p style="color: red;">An unexpected error has occurred while processing your 
					 request. Please make sure all the details are correct and try after sometime.</p>';
			}
			session_start();
			$_SESSION['errors'] = $errors;
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
