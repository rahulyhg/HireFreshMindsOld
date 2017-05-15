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

<script src="search.js"></script>
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
