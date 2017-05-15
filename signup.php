<?php
// define variables and set to empty values
$errors = array();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

$usrName = test_input($_POST['usrName']);
$email = test_input($_POST['email']);
$usrPassword = test_input($_POST['usrPassword']);
$usrPhone = test_input($_POST['usrPhone']);
$profileSelect = test_input($_POST['profileSelect']);
$collegeWebsite = test_input($_POST['collegeWebsite']);
$collegeName = test_input($_POST['collegeName']);
$proCompanyName = test_input($_POST['proCompanyName']);
$empOrgName = test_input($_POST['empOrgName']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match("/^[a-zA-Z ]*$/",$usrName)) {
	  $errors['usrName'] =  'Only letters and white space allowed for the name<br />';
	}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $errors['email'] = 'Invalid email format';
    }
	
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
	if(!empty($profileSelect)) {
		if($profileSelect === "college") {
			$role = 1;
			// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$collegeWebsite)) {
				$errors['collegeWebsite'] = 'Invalid website URL';
			}
			else {
			// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$collegeName)) {
					$errors['collegeName'] = 'Only letters and white space allowed';				
				}
				else {
					$sql = "INSERT INTO `college` (
					`name`, 
					`email`, 
					`password`, 
					`phone`,
					`collegeName`,		
					`website`,
					`role`
					)  VALUES (
					'".$usrName."',
					'".$email."',
					'".$usrPassword."',
					'".$usrPhone."',
					'".$collegeName."',
					'".$collegeWebsite."',
					'".$role."'
					)"; 
					if ($conn->query($sql) === TRUE) {
						echo '<p style="color: aquamarine;">Account has been successfully created, Please wait
							 while the admin varifies your account. It usually takes 30 
							 minutes to verify your account. Incase of any problems during verification
							 we will notify you through the email provided.	</p>';
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
		}
		if($_POST["profileSelect"] === "student") {
			$collegeName = test_input($_POST["collegeName"]);
			$sql = "SELECT 
				`id`	
				FROM `college` WHERE collegeName='$collegeName'";
			$result = mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($result);
			if ($rows == 1) {
				$row=mysqli_fetch_row($result);
				$college_id = $row[0];
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$collegeName)) {
					$collegeNameErr = "Only letters and white space allowed"; 
				}
				else{
					$role = 2;
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$collegeName)) {
						$errors['collegeName'] = 'Only letters and white space allowed';				
					}
					else {
						$sql = "INSERT INTO `student` (
						`college_id`, 
						`name`, 
						`email`, 
						`password`, 
						`phone`,
						`collegeName`,		
						`role`
						)  VALUES (
						'".$college_id."',
						'".$usrName."',
						'".$email."',
						'".$usrPassword."',
						'".$usrPhone."',
						'".$collegeName."',
						'".$role."'
						)"; 
						if ($conn->query($sql) === TRUE) {
							echo '<p style="color: aquamarine;">Account has been successfully created, Please verify
								your account by clicking on the verification URL sent to your mail id</p>';
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
			}
		}
		if($_POST["profileSelect"] === "professional") {
	  
		}
		if($_POST["profileSelect"] === "employer") {
	  
	}
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
