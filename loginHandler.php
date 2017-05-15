<?php
	$error=''; // Variable To Store Error Message
	if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is empty	";
	}
	else{
	// Define $username and $password
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	
	$connection = mysqli_connect("localhost", "root", "");
	
	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$password = stripslashes($password);
	
	$username = mysqli_real_escape_string($connection,$username);
	$password = mysqli_real_escape_string($connection,$password);
	// Selecting Database
	$db = mysqli_select_db($connection,"hfm");
	// SQL query to fetch information of registerd users and finds user match.
	$result = mysqli_query($connection,"select * from user where password='$password' AND username='$username'");
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		session_start(); // Starting Session
		$row=mysqli_fetch_row($result);
		echo $_SESSION['login_user'];
		if($row[3] == 0){
			$_SESSION['login_user']= 'admin'; // Initializing Session
			header("location: admin/index.php");
		}
		//college Admin Login
		if($row[3] == 1){
			$_SESSION['login_user']= 'collegeAdmin'; // Initializing Session
			$_SESSION['login_username'] = $row[1];
			$_SESSION['login_id'] = $row[0];
			$_SESSION['profile_status'] = $row[4];
			header("location: collegeAdmin/index.php");
		}
		//student Login
		if($row[3] == 2){
			$_SESSION['login_user']= 'student'; // Initializing Session
			$_SESSION['login_username'] = $row[1];
			$_SESSION['login_id'] = $row[0];
			$sql = "SELECT 
				`id`	
				FROM `college` WHERE collegeName='$collegeName'";
			$result = mysqli_query($conn,$sql);
			$rows = mysqli_num_rows($result);
			$_SESSION['college_id'] = $row[0];
			$_SESSION['profile_status'] = $row[4];
			header("location: student/index.php");
		}
		if($row[3] == 3){
			$_SESSION['login_user']= 'professional'; // Initializing Session
			header("location: professional/index.php");
		}
		
		
		
		//header("location: profile.php"); // Redirecting To Other Page
	} else {
		$error = "Username or Password is invalid";
	}
		mysqli_close($connection); // Closing Connection
	}
	/*
	if($username == 'admin' && $password == 'admin'){
		header("location: hfm/index.html");
	}
	else{
		header("location: dashboard.php");
	}*/
// Store Session Data


?>