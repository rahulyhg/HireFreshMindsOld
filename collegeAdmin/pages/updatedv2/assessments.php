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
<div id="phpMsges" style="display:none;">
												
</div>
<!-- Add Question item Modal -->
<div id="addQModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="background-color: darkgray;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Add new Question</h4>
	  </div>
	  <div class="modal-body" id="modalBody">
		<form>
		<div class="form-group row">
		  <label for="question" class="col-2 col-form-label">Question</label>
		  <div class="col-8">
			<input class="form-control" type="text" placeholder="Question" id="question">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="option1" class="col-2 col-form-label">Option 1</label>
		  <div class="col-10">
			<input class="form-control" type="text" placeholder="Option 1" id="option1">
		  </div>
		</div>
	
		<div class="form-group row">
		  <label for="option2" class="col-2 col-form-label">Option 2</label>
		  <div class="col-10">
			<input class="form-control" type="text" placeholder="Option 2" id="option2">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="option3" class="col-2 col-form-label">Option 3</label>
		  <div class="col-10">
			<input class="form-control" type="text" placeholder="Option 3" id="option3">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="option4" class="col-2 col-form-label">Option 4</label>
		  <div class="col-10">
			<input class="form-control" type="text" placeholder="Option 4" id="option4">
		  </div>
		</div>
		<input id="assessmentID" type="hidden" value=""/>
		</form>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" id="addQuestion" onclick="assessmentAddQuestionAjaxCall();">Submit</button>
		<button type="button" class="btn btn-default" id="closeModal" assessmentEditQuestionAjaxCall data-dismiss="modal">Close</button>
	  </div>
	</div>

  </div>
</div>
<!-- ./Add Question item Modal -->
<!-- Edit Question item Modal -->
<div id="editQModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="background-color: darkgray;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Questions list for the Assessment</h4>
	  </div>
	  <div class="modal-body" id="modalBodyEdit">
		<ul class="list-group" id="questionListing">
		  <li class="list-group-item">Dummy</li>
		</ul>
	  </div>
	  <div class="modal-footer">
		<!--<button type="button" class="btn btn-default" id="addQuestion" onclick="assessmentAddQuestionAjaxCall();">Submit</button>-->
		<button type="button" class="btn btn-default" id="closeModal" data-dismiss="modal">Close</button>
	  </div>
	</div>

  </div>
</div>
<!-- ./Edit Question item Modal -->
<div class="row" style="margin-top:5%">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Manage Assessments
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab">Assessments List</a>
					</li>
					<li><a href="#addAssessment" data-toggle="tab">Add Assessment</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="home">
						<!-- Internal Pane -->
						<div class="panel-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" style="margin-bottom:20px;">
								<li class="active"><a href="#running" data-toggle="tab">Running/Upcoming Assessments</a>
								</li>
								<li><a href="#archived" data-toggle="tab">Completed Assessments</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="running" >
									<!--<h4>Home Tab</h4>-->
									<table id="runningAssessmentsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										
									</table>
								</div>
								<div class="tab-pane fade" id="archived">
									<!--<h4>Profile Tab</h4> -->
									<table id="archivedAssessmentsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										
									</table>
								</div>
							</div>
						</div>
						<!-- ./Internal Pane -->
					</div>
					<div class="tab-pane fade" id="addAssessment">
						<h2>Add new Assessment</h2>
							<form style="margin-top:2%;">
								<div class="form-group">
									<label for="assessmentName">Assessment name</label>
									<input type="text" class="form-control" id="assessmentName" aria-describedby="nameHelp" placeholder="Enter assessment name">
									<small id="nameHelp" class="form-text text-muted">Please provide a name for the assessment</small>
								</div>
								<div class="form-group">
									<label for="assessmentDuration">Assessment duration</label>
									<input type="number" class="form-control" id="assessmentDuration" aria-describedby="nameHelp" placeholder="Enter assessment duration">
									<small id="nameHelp" class="form-text text-muted">Please provide duration for the assessment</small>
								</div>
								<div class="form-group">
									<label for="assessmentQuestionCount">No. of questions</label>
									<input type="number" class="form-control" id="assessmentQuestionCount" aria-describedby="nameHelp" placeholder="Enter number of Questions">
									<small id="nameHelp" class="form-text text-muted">How many questions will be there in this assessment?</small>
								</div>
								<h5><strong>Assessment running period</strong></h5>	
								<!-- Linked Date Picker -->
								<div class="row">
									<div class='col-md-5'>
										<div class="form-group">
											<label>Start Date:</label>
												<input type="text" id="assessmentStartDate" />
										</div>
									</div>
									<div class='col-md-5'>
										<div class="form-group">
											<label>End Date:</label>
												<input type="text" id="assessmentEndDate" />
										</div>
									</div>
								</div>
								<h6><strong>Note: </strong>Please select same Start date and End date if the Assessment is to be scheduled for a single day</h6>
								<button type="submit" class="btn btn-primary btn-lg pull-right" onclick="addAssessment();">Submit</button>
							</form>
					</div>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<script>
	$(document).ready(function(){
		//Date Time Picker
		$(function() {
			$('#assessmentStartDate, #assessmentEndDate').datepicker({
				showOn: "both",
				beforeShow: customRange,
				dateFormat: "dd M yy",
			});

		});

		function customRange(input) {

			if (input.id == 'assessmentEndDate') {
				var minDate = new Date($('#assessmentStartDate').val());
				minDate.setDate(minDate.getDate())

				return {
					minDate: minDate

				};
			}

			return {}

		}
		$.ajax({
			url : 'fetchAssessments.php',
			data:{"status":"running"},
			type: 'GET',

			success: function(data){
				debugger;
				console.log(data);
				$('#runningAssessmentsTable').DataTable( {
				data: JSON.parse(data),
				columns: [
					{ title: "Name" },
					{ title: "Duration" },
					{ title: "Start date" },
					{ title: "End date" },
					{ title: "No. of Questions" },
					{ title: "Edit/Add Questions" }
					]
				} );
			}
		});
		$.ajax({
			url : 'fetchAssessments.php',
			data:{"status":"archived"},
			type: 'GET',

			success: function(data){
				debugger;
				console.log(data);
				$('#archivedAssessmentsTable').DataTable( {
				data: JSON.parse(data),
				columns: [
					{ title: "Name" },
					{ title: "Duration" },
					{ title: "Start date" },
					{ title: "End date" },
					{ title: "No. of Questions" },
					{ title: "Edit/Add Questions" }
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
