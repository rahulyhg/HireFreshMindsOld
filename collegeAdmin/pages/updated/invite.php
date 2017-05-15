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
		
