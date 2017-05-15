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
<style>
	input[type="checkbox"]:checked+label{ font-size: 16px; color:#8cc63f;} 
	.ui-checkbox {
		display: none;
	}

	.ui-checkbox + label {
	  position: relative;
	  padding-left: 25px;
	  margin-bottom: 10px;
	  display: inline-block;
	  font-size: 12px;
	}
	 
	.ui-checkbox + label:before {
		background-color: #fff;
		border: 1px solid #30b0d7;    
		padding: 9px;
		border-radius: 3px;
		display: block;
		position: absolute;
		top: 0;
		left:0;
		content: "";
	}
	 

	 
	.ui-checkbox:checked + label:before {
		border: 1px solid #30b0d7;    
		color: #99a1a7;
	}

	.ui-checkbox.no-border:checked + label:before {
		border-color: transparent;
	}


	 
	.ui-checkbox:checked + label:after {
		content: '\2714';
		font-size: 14px;
		position: absolute;
		top: 1px;
		left: 4px;
		color: #30b0d7;
	}
	 
	.ui-checkbox.green-tick:checked + label:after {
		color: #8cc63f;
	}
</style>

<div id="empty" style="margin-top:5%;">
												
</div>
<div id="phpMsges" style="display:none;">
												
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Manage Events
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#eventList" data-toggle="tab">Events List</a>
					</li>
					<li><a href="#addEvent" data-toggle="tab">Add Event</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="eventList">
						<!-- Internal Pane -->
						<div class="panel panel-default">
							<div class="panel-body">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" style="margin-bottom:20px;">
									<li class="active"><a href="#running" data-toggle="tab">Upcoming Events</a>
									</li>
									<li><a href="#archived" data-toggle="tab">Past Events</a>
									</li>
								</ul>
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="running" >
										<!--<h4>Home Tab</h4>-->
										<table id="runningEventsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
											
										</table>
									</div>
									<div class="tab-pane fade" id="archived">
									<!--<h4>Add new Event</h4> -->
									<table id="archivedTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										
									</table>
								</div><!--./archived -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="addEvent">
						<!-- ADD event start -->
							<h2>Add new Event</h2>
							<form style="margin-top:2%;">
								<div class="form-group">
									<label for="eventName">Event name</label>
									<input type="text" class="form-control" id="eventName" aria-describedby="nameHelp" placeholder="Enter event name">
									<small id="nameHelp" class="form-text text-muted">Please provide full name of the event</small>
								</div>
								<!--Checkbox farm starts -->
								<h5><strong>Select event type</strong></h5>
								<div class="row">
								  <div class="col-sm-3">
									<input type="checkbox" id="chkTechnical" value="Technical" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkTechnical">Technical</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkConferences" value="Conferences" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkConferences">Conferences</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkMDM" value="Model United Nations" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkMDM">Model United Nations</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkES" value="Entrepreneurship Summit" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkES">Entrepreneurship Summit</label>
								  </div>
								</div>
								<div class="row">
								  <div class="col-sm-3">
									<input type="checkbox" id="chkCultural" value="Cultural" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkCultural">Cultural</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkSeminar" value="Seminar" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkSeminar">Seminar</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkTEDx" value="TEDx" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkTEDx">TEDx</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkMedical" value="Medical" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkMedical">Medical</label>
								  </div>
								</div>
								<div class="row">
								  <div class="col-sm-3">
									<input type="checkbox" id="chkManagement" value="Management" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkManagement">Management</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkWorkshop" value="Workshop" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkWorkshop">Workshop</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkSummit" value="Summit" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkSummit">Summit</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkPharma" value="Pharma" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkPharma">Pharma</label>
								  </div>
								</div>
								<div class="row">
								  <div class="col-sm-3">
									<input type="checkbox" id="chkSports" value="Sports" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkSports">Sports</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkSymposium" value="Symposium" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkSymposium">Symposium</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkConclave" value="Conclave" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkConclave">Conclave</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkBio" value="Bio Medical" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkBio">Bio Medical</label>
								  </div>
								</div>
								<div class="row">
								  <div class="col-sm-3">
									<input type="checkbox" id="chkLiterary" value="Literary" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkLiterary">Literary</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkYouth" value="Youth Summit" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkYouth">Youth Summit</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkConvention" value="Convention" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkConvention">Convention</label>
								  </div>
								  <div class="col-sm-3">
									<input type="checkbox" id="chkOnlineEvents" value="Online Events" data-group="eventType" class="ui-checkbox green-tick no-border unique" />
									<label for="chkOnlineEvents">Online Events</label>
								  </div>
								</div>
								<br/>
								<!--- Checkbox farm ends -->
								<!-- Linked Date Picker -->
								<h5><strong>Select event dates</strong></h5>	
								<div class="row">
									<div class='col-md-5'>
										<div class="form-group">
											<label>Start Date:</label>
												<input type="text" id="txtStartDate" />
										</div>
										<!--
										<div class="form-group">
											<div class='input-group date' id='datepicker1'>
												<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div> -->
									</div>
									<div class='col-md-5'>
										<div class="form-group">
											<label>End Date:</label>
												<input type="text" id="txtEndDate" />
										</div>
										<!--
										<div class="form-group">
											<div class='input-group date' id='datepicker2'>
												<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
										-->
									</div>
								</div>
								
								<!-- ./Linked Date Picker -->
								<!-- Commenting this. Maybe we can use this in future
								<div class="form-group">
								<label for="exampleSelect1">Example select</label>
								<select class="form-control" id="exampleSelect1" aria-describedby="branchHelp">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								</select>
								</div>
								-->
								
								<div class="form-group">
									<label for="eventDesc">Brief Description of the event</label>
									<textarea class="form-control" id="eventDesc" rows="3"></textarea>
								</div>
								<div class="row">
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventWebsite">Event website</label>
											<input type="text" class="form-control" id="eventWebsite" aria-describedby="websiteHelp" placeholder="Enter website URL">
											<small id="websiteHelp" class="form-text text-muted">Please provide website for the event</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventRegistrationURL">Event Registration URL</label>
											<input type="text" class="form-control" id="eventRegistrationURL" aria-describedby="eventRegistrationURLHelp" placeholder="Enter Registration URL">
											<small id="eventRegistrationURLHelp" class="form-text text-muted">Provide URL where participants can register themselves</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="collegeWebsite">College website</label>
											<input type="text" class="form-control" id="collegeWebsite" placeholder="Enter college website">
										</div>
									</div>
								</div>
								<div class="row">
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventFacebookLink">Facebook link</label>
											<input type="text" class="form-control" id="eventFacebookLink" aria-describedby="eventFacebookLinkHelp" placeholder="Enter Facebook URL">
											<small id="eventFacebookLinkHelp" class="form-text text-muted">Enter Facebook link where the event is getting advertised</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventTwitterLink">Twitter link</label>
											<input type="text" class="form-control" id="eventTwitterLink" aria-describedby="eventTwitterLinkHelp" placeholder="Enter Twitter URL">
											<small id="eventTwitterLinkHelp" class="form-text text-muted">Enter Twitter link where the event is getting advertised</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventYoutubeLink">Youtube link</label>
											<input type="text" class="form-control" id="eventYoutubeLink" aria-describedby="eventYoutubeLinkHelp" placeholder="Enter Youtube URL">
											<small id="eventYoutubeLinkHelp" class="form-text text-muted">Enter Youtube link where the event is getting advertised</small>
										</div>
									</div>
								</div>
								<div class="row">
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventPosterLink">Poster link</label>
											<input type="text" class="form-control" id="eventPosterLink" aria-describedby="eventPosterLinkHelp" placeholder="Enter Poster URL">
											<small id="eventPosterLinkHelp" class="form-text text-muted">Enter Poster link for the event</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventAndroidAppLink">Android App link</label>
											<input type="text" class="form-control" id="eventAndroidAppLink" aria-describedby="eventAndroidAppLinkHelp" placeholder="Enter Android App URL">
											<small id="eventAndroidAppLinkHelp" class="form-text text-muted">Enter Android App link for the event</small>
										</div>
									</div>
									<div class='col-md-4'>
										<div class="form-group">
											<label for="eventBrochureLink">Brochure link</label>
											<input type="text" class="form-control" id="eventBrochureLink" aria-describedby="eventBrochureLinkHelp" placeholder="Enter Brochure URL">
											<small id="eventBrochureLinkHelp" class="form-text text-muted">Enter Link where the Brochure for the event can be downloaded</small>
										</div>
									</div>
								</div>
								<div class="row">
									<div class='col-md-6'>
										<div class="form-group">
											<label for="eventVenue">Venue</label>
											<textarea class="form-control" id="eventVenue" rows="3"></textarea>
										</div>
									</div>
									<div class='col-md-6'>
										<div class="form-group">
											<label for="eventContact">Contact person details for Queries</label>
											<textarea class="form-control" id="eventContact" rows="3"></textarea>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-lg pull-right" onclick="addEvent();">Submit</button>
							</form>
				</div><!-- ADD event end -->
				</div> <!-- ./tab-content -->
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->
	</div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<script>
	$(document).ready(function(){
		//Date Time Picker
		$(function() {
			$('#txtStartDate, #txtEndDate').datepicker({
				showOn: "both",
				beforeShow: customRange,
				dateFormat: "dd M yy",
			});

		});

		function customRange(input) {

			if (input.id == 'txtEndDate') {
				var minDate = new Date($('#txtStartDate').val());
				minDate.setDate(minDate.getDate() + 1)

				return {
					minDate: minDate

				};
			}

			return {}

		}
		$.ajax({
			url : 'fetchEvents.php',
			data:{"id":"#container"},
			type: 'GET',

			success: function(data){
				debugger;
				$('#runningEventsTable').DataTable( {
				data: JSON.parse(data),
				columns: [
					{ title: "Name" },
					{ title: "Type" },
					{ title: "Start date" },
					{ title: "End date" },
					{ title: "Venue" },
					{ title: "Contact Person" }
					]
				} );
			}
		});
		$.ajax({
			url : 'fetchPastEvents.php',
			data:{"id":"#container"},
			type: 'GET',

			success: function(data){
				debugger;
				$('#archivedTable').DataTable( {
				data: JSON.parse(data),
				columns: [
					{ title: "Name" },
					{ title: "Type" },
					{ title: "Start date" },
					{ title: "End date" },
					{ title: "Venue" },
					{ title: "Contact Person" }
					]
				} );
			}
		});
		$('input.unique').click(function(){
			if(!$(this).prop('checked')) {
				return
			}
			var group = $(this).data('group');
			if(group) {
				$('input[data-group="'+group+'"]:checked').prop('checked',false);
				$(this).prop('checked',true);
				window.checkboxSelected = $(this).val();
			}
		});
		
		
														
	});
</script>