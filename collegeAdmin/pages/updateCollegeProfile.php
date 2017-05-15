<?php
// define variables and set to empty values
session_start();
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if(isset($_SESSION['login_user'])){
	$loggedInUserID = $_SESSION['login_user'];
	$loggedInUserEmail = (isset($_SESSION['login_username']))?$_SESSION['login_username']:''; 
}else{
	session_destroy();
	header("location: /HFM");
}
$collegeDesc = test_input($_POST['collegeDesc']);
$collegeBrochure = test_input($_POST['collegeBrochure']);
$collegeAddress = test_input($_POST['collegeAddress']);
$collegePhone = test_input($_POST['collegePhone']);
$coursesOffered = ($_POST['coursesOffered']);
$collegeWebsite = 'www.snist.com';
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$collegeWebsite)) {
	$errors['collegeWebsite'] = 'Invalid website URL';
}
$arr = serialize($coursesOffered);
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
		$status = 'completed';
		$sql = 
		"UPDATE `college` 
		SET 
		`collegeDesc`='".$collegeDesc."',
		`collegeAddress`='".$collegeAddress."',
		`collegePhone`='".$collegePhone."',
		`coursesOffered`='".$arr."',
		`status`='".$status."'
		WHERE email='".$loggedInUserEmail."'";
		//$statement = $conn-> prepare($sql);
		//$statement => bind_param(str_repeat('s', count($coursesOffered), ...$coursesOffered));
		//$statement->execute();
		//$result = $statement->get_results();
		if ($conn->query($sql) === TRUE) {
			$profile_status = isset($_SESSION['profile_status'])?$_SESSION['profile_status']:''; 
			if($profile_status == '' || $profile_status == 'not_completed'){
				$status = 'completed';
				$sql =
				"UPDATE `user` 
				SET 
				`status`='".$status."'
				WHERE username='".$loggedInUserEmail."'";
				if ($conn->query($sql) === TRUE) {
					$loginID = (string)$_SESSION['login_id'];
					$_SESSION['profile_status'] = 'completed';
					$eventsTable = $loginID . '_events';
					$sql=
					"CREATE 
					TABLE `hfm`. `$eventsTable`
					( 
					`name` VARCHAR(100) NOT NULL , 
					`type` VARCHAR(50) NOT NULL , 
					`fromDate` DATE NOT NULL , 
					`toDate` DATE NOT NULL , 
					`brief` TEXT NOT NULL , 
					`eventURL` VARCHAR(100) NOT NULL , 
					`regURL` VARCHAR(100) NOT NULL , 
					`collegeWebsite` VARCHAR(100) NOT NULL , 
					`FBLink` VARCHAR(100) NOT NULL , 
					`twitterLink` VARCHAR(100) NOT NULL , 
					`youtubeLink` VARCHAR(100) NOT NULL , 
					`posterLink` VARCHAR(100) NOT NULL , 
					`androidLink` VARCHAR(100) NOT NULL , 
					`brochureLink` VARCHAR(100) NOT NULL , 
					`venue` VARCHAR(100) NOT NULL , 
					`contactPerson` TEXT NOT NULL , 
					`college_id` INT NOT NULL , 
					`id` INT NOT NULL 
					)";
					if ($conn->query($sql) === TRUE) {
						$sql =
						"ALTER TABLE `$eventsTable` 
						ADD PRIMARY KEY(`id`)";
						if($conn->query($sql) === TRUE){
							$noticeTable = $loginID . '_noticeboard';
							$sql=
								"CREATE 
								TABLE `hfm`. `$noticeTable`
								( 
								`title` VARCHAR(100) NOT NULL , 
								`date` DATE NOT NULL , 
								`time` TIME NOT NULL , 
								`brief` TEXT NOT NULL , 
								`college_id` INT NOT NULL ,
								`status` VARCHAR(100) NOT NULL ,
								`id` INT NOT NULL 
								)";
								if ($conn->query($sql) === TRUE) {
									$sql =
									"ALTER TABLE `$noticeTable` 
									ADD PRIMARY KEY(`id`)";
									if($conn->query($sql) === TRUE){
										echo '<div class="alert alert-success" role="alert">
												You have completed your profile. Now you have access to all other features
											  </div><br/>';
									}
								}
						}
					}
				}else{
					echo '<div class="alert alert-danger" role="alert">
						Something went wrong. Please try again!
					  </div><br/>';
					exit;
				}
			}else{
				echo '<div class="alert alert-success" role="alert">
					Profile successfully updated!
				  </div><br/>';
				exit;
			}
				
		}
		else {
			if(($conn->errno) == 1062){
				echo '<p style="color: red;">An unexpected error has occurred while processing your 
					 request. Please make sure all the details are correct and try after sometime.</p>';
			}else{
				echo '<p style="color: red;">An unexpected error has occurred while processing your 
					 request. Please make sure all the details are correct and try after sometime.</p>';
			}
			//session_start();
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
