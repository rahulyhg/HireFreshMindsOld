<?php
	session_start();
		if(isset($_SESSION['login_user'])){
		echo '<script language="javascript">';
		echo 'alert("message login_user 1")';
		echo '</script>';
		if($_SESSION['login_user'] != 0){
			echo '<script language="javascript">';
			echo 'alert("message login_user sent")';
			echo '</script>';
			session_destroy();
			$_SESSION['login_user']= ''; // Devalidating Session
			header("location: /HFM");
		}
	}else{
		session_destroy();
		header("location: /HFM");
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/dashboard.php">
<title>SB Admin 2</title>
<script language="javascript">
    window.location.href = "pages/dashboard.php"
</script>
</head>
<body>
Go to <a href="pages/dashboard.php">/pages/dashboard.php</a>
</body>
</html>
