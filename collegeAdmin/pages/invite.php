<?php 
	session_start();
	$profile_status = isset($_SESSION['profile_status'])?$_SESSION['profile_status']:''; 
	if($profile_status == '' || $profile_status == 'not_completed'){
		echo '<div class="alert alert-danger" role="alert">
				<strong>Oh snap!</strong> You have to complete your profile before you can access this.
			  </div><br/><button type="button" onclick="populateCollegeProfile();" class="btn btn-primary btn-md">Click Here to complete your profile now.</button>';
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="margin-top:20px;">
	<div class="container">
		<div class="row">    
			<div class="col-xs-8 col-xs-offset-2">
				<div class="input-group">
					<div class="input-group-btn search-panel">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span id="search_concept">Filter by</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						  <li><a href="#students">Students and Recent Grads</a></li>
						  <li><a href="#jobs">Jobs</a></li>
						  <li><a href="#professionals">Professionals</a></li>
						  <li><a href="#greather_than">Companies</a></li>
						  <li><a href="#less_than">Colleges</a></li>
						</ul>
					</div>
					<input type="hidden" name="search_param" value="all" id="search_param">         
					<input type="text" class="form-control" id="search-text" name="search-text" placeholder="Enter search text">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button" onclick="submitSearch(event);"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="search.js"></script>

    <!-- Custom Theme JavaScript -->
</body>

</html>
search.html
<?php
$bar = isset($_POST['searchText']) ? $_POST['searchText'] : null;
$fname = "Hussain";
$lname = "Kazim";
$post_data = array(
    'searchText' => $bar,
    'first_name' => $fname,
    'last_name' => $lname,
);

echo json_encode($post_data);

?>
searchHandle.php
Chrome
Thursday, May 4th at 8:29 pm
Hell 
OnePlus One
Friday, May 5th at 12:39 pm
Rarely used Tamron 70-200 f2.8 lens for Canon - Hyderabad - Electronics & Appliances - Ameerpet Srinivasa Colony West
https://www.olx.in/item/rarely-used-tamron-70-200-f2-8-lens-for-canon-ID1bmGvw.html#dfdfdf0fce
Canon EF 24-105mm f/4L IS USM Zoom Lens for Canon DSLR Cameras - Hyderabad - Electronics & Appliances - Banjara Hills Noor Nagar
https://www.olx.in/item/canon-ef-24-105mm-f-4l-is-usm-zoom-lens-for-canon-dslr-cameras-ID1beRit.html#2f39563ba2
Canon 70-200mm 2.8 Is l Mint - Hyderabad - Electronics & Appliances - Kompalli
https://www.olx.in/item/canon-70-200mm-2-8-is-l-mint-ID1bkJmW.html#8d46ab466a
Chrome
Friday, May 5th at 2:49 pm
Yea bro. I will send the code. And I will send the next iteration by Monday
OnePlus One
Friday, May 5th at 6:46 pm
jQuery.suggest plugin
http://polarblau.github.io/suggest/
Friday, May 5th at 7:23 pm
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Newly added -->
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<style>
		#clickme:active {
			box-shadow: 0 0 30px #96f226
		}
		.ui-tooltip {
			background: #4a4a4a;
			color: #96f226;
			border: 2px solid #454545;
			border-radius: 0px;
			box-shadow: 0 0 
		}
		.ui-autocomplete {
			background: #4a4a4a;
			border-radius: 0px;
		}
		.ui-autocomplete.source:hover {
			background: #454545;
		}

		.ui-menu .ui-menu-item a {
			background:red;
			height:10px;
			font-size:8px;
		}

	</style>
</head>

<body style="margin-top:20px;">
	<div class="container">
		<div class="row">    
			<div class="col-xs-8 col-xs-offset-2">
				<div class="input-group">
					<div class="input-group-btn search-panel">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span id="search_concept">Filter by</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						  <li><a href="#students">Students and Recent Grads</a></li>
						  <li><a href="#jobs">Jobs</a></li>
						  <li><a href="#professionals">Professionals</a></li>
						  <li><a href="#greather_than">Companies</a></li>
						  <li><a href="#less_than">Colleges</a></li>
						</ul>
					</div>
					<input type="hidden" name="search_param" value="all" id="search_param">         
					<input type="text" class="form-control" id="search-text" name="search-text" placeholder="Enter search text">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button" onclick="submitSearch(event);"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="search.js"></script>

    <!-- Custom Theme JavaScript -->
</body>

</html>
search.html
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
		
		
	});
	$( function() {
			alert("Hello");
			 var availableTags = [
			  "ActionScript",
			  "AppleScript",
			  "Asp",
			  "BASIC",
			  "C",
			  "C++",
			  "Clojure",
			  "COBOL",
			  "ColdFusion",
			  "Erlang",
			  "Fortran",
			  "Groovy",
			  "Haskell",
			  "Java",
			  "JavaScript",
			  "Lisp",
			  "Perl",
			  "PHP",
			  "Python",
			  "Ruby",
			  "Scala",
			  "Scheme"
			];
			$( "#search-text" ).autocomplete({
			  source: availableTags
			});
		});
});

function submitSearch(event) {
	event.preventDefault();
	var searchText = $('#search-text').val();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "hrb";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		
	}
	//$query = "(SELECT name, college_name as type FROM student WHERE name LIKE '%zim')";


   // $result = mysqli_query($query);
   // if ($result) {
   //     while ($result = $result->fetch_assoc()) {
   //         echo"Database data like, $result['title']";
   //     }
   // }
   // else{
   //     echo "result Not found";
   // }
	
	var obj = {'searchText':'Hussain','lastname':'Kazim1'};
	//$inputs.prop("disabled", true);
	alert(searchText);
	
	// Fire off the request to /form.php
    request = $.ajax({
        url: "searchHandle.php",
        type: "post",
        data: { searchText : searchText }
    });
	
	// Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		var jsonObject = JSON.parse(response); 
		console.log(jsonObject); 
		console.log("First Name: " +jsonObject.first_name);
        console.log("Hooray, it worked!");
    });
	
	request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
	
	// Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        //$inputs.prop("disabled", false);
    });
}
search.js
<?php
$bar = isset($_POST['searchText']) ? $_POST['searchText'] : null;
$fname = "Hussain";
$lname = "Kazim";
$post_data = array(
    'searchText' => $bar,
    'first_name' => $fname,
    'last_name' => $lname,
);

echo json_encode($post_data);

?>
SB Admin 2 - Bootstrap Admin Theme
searchHandle.php
http://localhost:8001/hrm/pages/search.html
Chrome
Friday, May 5th at 8:40 pm
Hello
OnePlus One
Today at 2:00 PM
Body Building India - Abids, Hyderabad - Home
https://www.facebook.com/BBIAbids/
Today at 2:00 PM
The Camera Club of Hyderabad (TheCCH)
https://www.facebook.com/groups/thecch/?ref=nf_target&fref=nf
Overseas Registrations
https://telanganaepass.cgg.gov.in/OverseasReg.do
Today at 2:00 PM
<!DOCTYPE html>
<?php 
	session_start();
	
?>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>SB Admin 2 - Bootstrap Admin Theme</title>

		<!-- Bootstrap Core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="../vendor/morrisjs/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>
	<style>
		.holder{
			width:56px;
			margin:20px auto;
			position:relative;
		}

		.check-ios{
			visibility: hidden;
		}

		.holder span{
			background-color:#e2e2e2;
			display:block;
			height:20px;
			width:35px;
			position: absolute;
			top:0;
			left:0;
			z-index:1;	

			-webkit-border-radius: 15px;
			   -moz-border-radius: 15px;
					border-radius: 15px;

			-webkit-transition: all .5s ease;
			   -moz-transition: all .5s ease;
				 -o-transition: all .5s ease;
				-ms-transition: all .5s ease;
					transition: all .5s ease;	
		}

		.holder span:after {
			background-color:#fff;
			content:'';
			display:block;
			height:20px;
			width:35px;	
			position: absolute;
			top:1px;
			left:1px;
			z-index:2;

			-webkit-border-radius: 14px;
			   -moz-border-radius: 14px;
					border-radius: 14px;

			-webkit-transition: all .4s ease;
			   -moz-transition: all .4s ease;
				 -o-transition: all .4s ease;
				-ms-transition: all .4s ease;
					transition: all .4s ease;
		}


		.holder label{
			background: #fff;
			cursor: pointer;
			display: block;
			height: 20px;
			width: 20px;
			position: absolute;
			top:0px;
			left:1px;
			z-index:3;	

			-webkit-border-radius: 50%;
			   -moz-border-radius: 50%;
					border-radius: 50%;

			-webkit-transition: all .4s ease;
			   -moz-transition: all .4s ease;
				 -o-transition: all .4s ease;
				-ms-transition: all .4s ease;
					transition: all .4s ease;

			-webkit-box-shadow: 1px 1px 3px 0 rgba(0,0,0,0.3);
			   -moz-box-shadow: 1px 1px 3px 0 rgba(0,0,0,0.3);
					box-shadow: 1px 1px 3px 0 rgba(0,0,0,0.3);
		}

		.check-ios:checked ~ span {
			background-color:#4FD065;
		}

		.check-ios:checked ~ span:after {
			height:0;
			width:0;
			left:50%;
			top:50%;
		}

		.check-ios:checked + label {
			left: 16px;
			top:0px;
		}
		.verticalLine {
		  margin-top: 50px;
		  margin-left:80px;
		  border-left: thick solid #000080;
		  height: 300px;
		  width:5px;
		  box-shadow: 0px 10px 10px 5px #888888;
		}
	</style>
	</head>

	<body style="background-color: rgba(230, 230, 255, 0.59);">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-3" style="margin-top:5%;">
				<div class="form-group" style="margin-bottom:35px;">
					<h2 style="color:#001f3f;">Log in</h2>
				</div>
				
				<form method="post" action="signup.php">
				  <div class="form-group">
					<label for="email" style="color:#0074D9;">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="user@domain.com">
				  </div>
				  <div class="form-group">
					<label for="password" style="color:#0074D9;">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="password">
				  </div>
				  <div class="form-group pull-left" style="margin-bottom:0px;">
					  <div class="holder">
						<input type="checkbox" value="None" id="check_s" name="check" class="check-ios" checked />
						<label for="check_s"></label>
						<span></span>
					  </div>
				  </div>
					<br/>
					<strong style="margin-left:-10px;color:#0074D9;">Remember me</strong>
					<br/>
					<br/>
				  
				  <button type="submit" class="btn btn-lg btn-primary pull-right" style="width:100%;">Submit</button>
				</form>
			</div>
			<div class="col-md-2">
				<div class="verticalLine">
				  
				</div>
				<div class="center">
					<span> or </span>
				</div>
				<div class="verticalLine">
				  
				</div>
			</div>
			<div class="col-md-4" style="margin-top:5%;">
				<div class="form-group" style="margin-bottom:35px;">
					<h2 style="color:#001f3f;">New User? Register below</h2>
				</div>
				<form method="post" action="signup.php">
				  <div class="form-group">
					<label for="usrName" style="color:#0074D9;">Name:</label>
					<input type="text" class="form-control" name="usrName" id="usrName" placeholder="Full name">
				  </div>
				  <div class="form-group">
					<label for="email" style="color:#0074D9;">Email address:</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="user@domain.com">
				  </div>
				  <div>
					<?php 
						if(isset($_SESSION['errors'])) {
							$error = $_SESSION['errors'];
							if(isset($error['email'])) {
								echo '<p style="color:red;">';
								echo $error['email'];
								echo '</p>';
							}
						unset($_SESSION['errors']);
						}
					?>
				  </div>
				  <div class="form-group">
					<label for="usrPassword" style="color:#0074D9;">Password:</label>
					<input type="password" class="form-control" name="usrPassword" id="usrPassword" placeholder="password">
				  </div>
				  <div class="form-group">
					<label for="usrConfirmPassword" style="color:#0074D9;">Confirm Password:</label>
					<input type="password" class="form-control" name="usrConfirmPassword" id="usrConfirmPassword" placeholder="Retype password">
				  </div>
				  <div class="form-group">
					<label for="usrPhone" style="color:#0074D9;">Contact number:</label>
					<input type="number" maxlength="10" class="form-control" name="usrPhone" id="usrPhone" placeholder = "+1 (xxx) xxx-xxx">
				  </div>
				  <div class="form-group">
					  <label for="profileSelect" style="color:#0074D9;">Select profile type:</label>
					  <select id="profileSelect" name="profileSelect" class="form-control" data-style="btn-success">
						<option value="default">Select Option</option>
						<option value="student">Student</option>
						<option value="college">College</option>
						<option value="professional">Professional</option>
						<option value="employer">Employer</option>
					  </select>
				  </div>
				  <div id="dynamic">
					  <div id="collegeWebsiteFormGroup" class="form-group" style="display:none;">
						<label for="collegeWebsite" style="color:#0074D9;">College Website:</label>
						<input type="text" class="form-control" name="collegeWebsite" id="collegeWebsite">
					  </div>
					  
					  <div id="collegeNameFormGroup" class="form-group" style="display:none;">
						<label for="collegeName" style="color:#0074D9;">College Name:</label>
						<input type="text" class="form-control" name="collegeName" id="collegeName">
					  </div>
					  
					  <div id="proCompanyFormGroup" class="form-group" style="display:none;">
						<label for="proCompanyName" style="color:#0074D9;">Current/Last Organization:</label>
						<input type="text" class="form-control" name="proCompanyName" id="proCompanyName">
					  </div>
					  
					  <div id="empOrgFormGroup" class="form-group" style="display:none;">
						<label for="empOrgName" style="color:#0074D9;">Organization Name</label>
						<input type="text" class="form-control" name="empOrgName" id="empOrgName">
					  </div>
				  </div>
				  <button type="submit" class="btn btn-lg btn-primary" style="width:100%;">Submit</button>
				</form>
			</div>
			<div class="col-md-2">
			</div>
			<br/>
		</div>
		<div style="height:100px;">
		</div>
		
	</body>
	<script>
		$('#profileSelect').on('change', function() {
		  if( this.value === 'default'){
		    $('#dynamic').hide();
			return;
		  }
		  $('#dynamic').hide();
		  if( this.value === 'college'){
			$('#collegeNameFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			$('#empOrgFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			
			$('#collegeWebsiteFormGroup').show();
			$('#collegeNameFormGroup').show();
		  }
		  if( this.value === 'student'){
		    $('#collegeNameFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			$('#empOrgFormGroup').hide();
			$('#collegeWebsiteFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			
			$('#collegeNameFormGroup').show();
		  }
		  if( this.value === 'professional'){
			$('#collegeNameFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			$('#empOrgFormGroup').hide();
			$('#collegeWebsiteFormGroup').hide();
			$('#collegeNameFormGroup').hide();
			
			$('#proCompanyFormGroup').show();
		  }
		  if( this.value === 'employer'){
			$('#collegeNameFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			$('#empOrgFormGroup').hide();
			$('#collegeWebsiteFormGroup').hide();
			$('#collegeNameFormGroup').hide();
			$('#proCompanyFormGroup').hide();
			
			$('#empOrgFormGroup').show();
		  }
		  $('#dynamic').show();
		})
	</script>
</html>