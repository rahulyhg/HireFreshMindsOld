<?php
	session_start();
	$_SESSION['login_user']= ''; // Devalidating Session
	session_destroy();
	header("location: /HFM");
?>