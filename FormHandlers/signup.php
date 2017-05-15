<?php
// define variables and set to empty values
$errors = array();
echo '<script>';
echo 'alert("Hello World");'
echo '</script>';
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usrName"])) {
	$errors['usrName'] =  'Name is required.<br />';
  } else {
    $usrName = test_input($_POST["usrName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$usrName)) {
	  $errors['usrName'] =  'Only letters and white space allowed for the name<br />';
    }
  }
  
  if (empty($_POST["email"])) {
	$errors['email'] = 'Email is required';
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $errors['email'] = 'Invalid email format';
    }
  }

  if (empty($_POST["usrConfirmPassword"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["usrConfirmPassword"]);
    // check if e-mail address is well-formed
  }
  
   if (empty($_POST["usrPassword"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["usrPassword"]);
  }
  
  if (empty($_POST["usrPhone"])) {
    $phoneErr = "Contact number is required";
  } else {
    $phone = test_input($_POST["usrPhone"]);
  }
  //Connecting to MySQL
	$servername = "localhost";
	$username = "root";
	$dbpassword = "";
	$dbname = "hrb";
	// Create connection
	$conn = new mysqli($servername, $username, $dbpassword, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
  if(!empty($_POST["profileSelect"])) {
	  if($_POST["profileSelect"] === "default") {
		  $profileSelectErr = "Please select a profile from the dropdown";
	  }
	if($_POST["profileSelect"] === "college") {
		if (empty($_POST["collegeWebsite"])) {
			$collegeWebsite = "";
		} else {
			$collegeWebsite = test_input($_POST["collegeWebsite"]);
			// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$collegeWebsite)) {
				$errors['collegeWebsite'] = 'Invalid website URL';
				}
			}
		if (empty($_POST["collegeName"])) {
			$errors['collegeWebsite'] = 'College Name is required';
		} else {
			$collegeName = test_input($_POST["collegeName"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$collegeName)) {
				$errors['collegeWebsite'] = 'Only letters and white space allowed';				
				}
			}
		$sql = "INSERT INTO `college` (
		`name`, 
		`email`, 
		`password`, 
		`phone`,
		`collegeName`,		
		`website`
		)  VALUES (
		'".$usrName."',
		'".$email."',
		'".$password."',
		'".$phone."',
		'".$collegeName."',
		'".$collegeWebsite."'
		)"; 
		echo $sql;
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			echo '<br/>';
			printf("Errorcode: %d\n", $conn->errno);
			if(($conn->errno) == 1062){
				$errors['email'] = 'The entered email is already registered. Please Log in back using using the email <br/>';	
			}
			session_start();
			$_SESSION['errors'] = $errors;
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}

		$conn->close();
		
	}
	if($_POST["profileSelect"] === "student") {
		if (empty($_POST["collegeName"])) {
			$collegeNameErr = "College Name is required";
		} else {
			$collegeName = test_input($_POST["collegeName"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$collegeName)) {
				$collegeNameErr = "Only letters and white space allowed"; 
			}
		}
		$sql = "INSERT INTO `student` (
		`name`, 
		`email`, 
		`password`, 
		`phone`,
		`collegeName`
		)  VALUES (
		'".$name."',
		'".$email."',
		'".$password."',
		'".$phone."',
		'".$collegeName."'
		)"; 
		echo $sql;
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
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
