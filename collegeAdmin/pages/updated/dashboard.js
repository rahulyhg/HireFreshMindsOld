$(document).ready(function(e){
	//block body load until all dynamic contents are loaded on the page
	//debugger;
	refreshNoticeboard();
	 
});
function refreshNoticeboard() {
	$('#noticeBoardList').html('');
	$('#spinner').show();
	//debugger;
	$.ajax({
		url : 'fetchNoticeboard.php',
		data:{"status":"running","filter":"today"},
		type: 'POST',

		success: function(data){
			//debugger;
			console.log(data);
			if(data == 'newUser'){
				$('#noticeBoardList').html('');
				$('#noticeBoardList').hide();
				$('#spinner').hide();
				$('#noticeBoardList').append('<span><i>Note: Noticeboard items will appear here once your profile is complete.</i>')
				$('#noticeBoardList').show();
				return;
			}
			
			var noticeItems = JSON.parse(data);
			if(noticeItems.length == 0){
				$('#noticeBoardList').html('');
				$('#noticeBoardList').hide();
				$('#spinner').hide();
				$('#noticeBoardList').append('<span><i>Noticeboard is empty! click the green button to create new notice item</i>')
				$('#noticeBoardList').show();
				return;
			}
			console.log(noticeItems);
			$('#noticeBoardList').hide();
			for (j = 0; j < noticeItems.length; j++) {
				var arr = noticeItems[j];
				console.log(arr);
				var id = arr[0];
				var title = arr[1];
				var date = arr[2];
				var time = arr[3];
				var brief = arr[4];
				$('#noticeBoardList').append('<a href="#" class="list-group-item list-group-item-info" onclick="modifyNoticeItem('+id+');" data-toggle="button"><h4 class="list-group-item-heading"><strong>'+title+'</strong><span class="pull-right label label-success value="13:45:00"">'+time+'</span></h4><p class="list-group-item-text">'+brief+'</p><input type="hidden" value="'+id+'"/></a>');
			}
			setTimeout(function() {
				$('#spinner').hide();
				$('#noticeBoardList').show();
			}, 1500);
			
		}
	});
}
function modifyNoticeItem(id){
	 $.when(
        $.ajax({
		url : 'fetchNoticeboard.php',
		data:{"id":id,"status":"running","type":"single"},
		type: 'POST',

		success: function(data){
			//debugger;
			console.log(data);
			var noticeItem = JSON.parse(data);
			console.log(noticeItem);
			//$('#noticeBoardList').hide();
			for (j = 0; j < noticeItem.length; j++) {
				//debugger;
				var arr = noticeItem[j];
				console.log(arr);
				var id = arr[0];
				var title = arr[1];
				var date = arr[2];
				var time = arr[3];
				var brief = arr[4];
				
			}
			//debugger;
			$('#editNoticeTitle').attr('value',title);
			$('#editNoticeDesc').attr('value',brief);
			$('#editNoticeDate').attr('value',date);
			$('#editNoticeTime').attr('value',time);
			$('#finalID').attr('value',id);
			$('#editModal').modal('toggle');

		}
	})
    ).then( function(){
		//something after the ajax call
       
    });
}
function updateNotice() {
	$replaceHTML = $('#editModalBody').html();
	var Data = {
		title : $('#editNoticeTitle').val(),
		desc : $('#editNoticeDesc').val(),
		date : $('#editNoticeDate').val(),
		time : $('#editNoticeTime').val(),
		id : $('#finalID').val()
		}
		//debugger;
		console.log(Data);
		$.ajax({
			url : 'updateNotice.php',
			data:Data,
			type: 'POST',

			success: function(data){
				//debugger;
				$('#editModalBody').html('');
				$('#editModalBody').append(data);
				console.log(data);
				//$('#closeNotice').removeAttr('disabled');
				refreshNoticeboard();
				setTimeout(function() {
					$('#editModal').modal('toggle');
					$('#editModalBody').html($replaceHTML);
				}, 1000);
				
			}
		});
}
function removeNotice() {
	$replaceHTML = $('#editModalBody').html();
	$('#addNotice').attr('disabled','disabled');
	$('#closeNotice').attr('disabled','disabled');
	var Data = {
		id : $('#finalID').val()
		}
		//debugger;
		$.ajax({
			url : 'removeNotice.php',
			data:Data,
			type: 'POST',

			success: function(data){
				//debugger;
				$('#editModalBody').html('');
				$('#editModalBody').append(data);
				console.log(data);
				//$('#closeNotice').removeAttr('disabled');
				refreshNoticeboard();
				setTimeout(function() {
					$('#editModal').modal('toggle');
					$('#editModalBody').html($replaceHTML);
					$('#modifyNotice').removeAttr('disabled');
					
				}, 1500);
				
			}
		});
}
function addNoticeItem(){
	$('#addNotice').attr('disabled','disabled');
	$('#closeNotice').attr('disabled','disabled');
	var notice = {
		title : $('#noticeTitle').val(),
		date : $('#noticeDate').val(),
		time : $('#noticeTime').val(),
		brief : $('#noticeDesc').val(),
		statuss : "running"
	};
	$replaceHTML = $('#modalBody').html();
	$('#modalBody').html('');
	$('#modalBody').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:darkgray;padding-top:2%;"></i></center>');
	console.log(notice);
	$.ajax({
		url : 'addNotice.php',
		data: notice,
		type: 'POST',

		success: function(data){
			//debugger;
			console.log(data);
			$('#modalBody').html('');
			$('#modalBody').append(data);
			//$('#closeNotice').removeAttr('disabled');
			refreshNoticeboard();
			setTimeout(function() {
				$('#myModal').modal('toggle');
				$('#modalBody').html($replaceHTML);
				$('#addNotice').removeAttr('disabled');
			}, 1500);
			
		}
	});
}

function addEvent(){
	var data = {
		name : $('#eventName').val(),
		type : window.checkboxSelected,
		fromDate : $('#txtStartDate').val(),
		toDate : $('#txtEndDate').val(),
		brief : $('#eventDesc').val(),
		eventURL : $('#eventWebsite').val(),
		regURL: $('#eventRegistrationURL').val(),
		collegeWebsite : $('#collegeWebsite').val(),
		FBLink : $('#eventFacebookLink').val(),
		twitterLink : $('#eventTwitterLink').val(),
		youtubeLink : $('#eventYoutubeLink').val(),
		posterLink : $('#eventPosterLink').val(),
		androidLink : $('#eventAndroidAppLink').val(),
		brochureLink : $('#eventBrochureLink').val(),
		venue : $('#eventVenue').val(),
		contactPerson : $('#eventContact').val()
	};
	$.ajax({
		url : 'addEvent.php',
		data: data,
		type: 'POST',
		
		success : function(data){
			//debugger;
			console.log(data);
			$('#phpMsges').html('');
			$('#phpMsges').append(data);
			$('#phpMsges').show();
			location.href = '#phpMsges';
			setTimeout(function() {
				$('#phpMsges').hide();
				populateEvents();
			}, 3000);
		},
		error : function(data){
			$('#phpMsges').html('');
			$('#phpMsges').append(data);
			$('#phpMsges').show();
		},
		statusCode : {
			404: function(){
				alert("page not found");
			}
		}
	});
}
function addAssessment(){
	var data = {
		name : $('#assessmentName').val(),
		//type : window.checkboxSelected,
		duration : $('#assessmentDuration').val(),
		fromDate : $('#assessmentStartDate').val(),
		toDate : $('#assessmentEndDate').val(),
		questionCount : $('#assessmentQuestionCount').val()
	};
	$.ajax({
		url : 'addAssessment.php',
		data: data,
		type: 'POST',
		
		success : function(data){
			//debugger;
			console.log(data);
			$('#phpMsges').html('');
			$('#phpMsges').append(data);
			$('#phpMsges').show();
			location.href = '#phpMsges';
			setTimeout(function() {
				$('#phpMsges').hide();
				populateAssessments();
			}, 3000);
		},
		error : function(data){
			$('#phpMsges').html('');
			$('#phpMsges').append(data);
			$('#phpMsges').show();
		},
		statusCode : {
			404: function(){
				alert("page not found");
			}
		}
	});
}
function assessmentAddQuestion(id){
	$('#assessmentID').attr('value',id);
	$('#addQModal').modal('toggle');
	$('#addQModal').show();
	//assessmentAddQuestionAjaxCall(id);
	debugger;
	
}
function deleteQuestion(questionID){
	debugger;
	var ID = '#assessmentID_'+questionID;
	var assessmentID = $(ID).val();
	var listItemID = '#listItem_'+questionID;
	var replaceHTML = $(listItemID).html();
	//debugger; removeNotice
	$.ajax({
		url : 'deleteQuestion.php',
		data: {"questionID" : questionID, "assessmentID" : assessmentID},
		type: 'POST',

		success: function(data){
			debugger;
			console.log(data);
			$(listItemID).html('');
			$(listItemID).append(data);
			//$('#closeNotice').removeAttr('disabled');
			setTimeout(function() {
				$(listItemID).remove();
			}, 1000);
			
		}
	});
}
function assessmentEditQuestion(id){
	$.when( 
		$.ajax({
			url : 'fetchQuestions.php',
			data: {"assessmentID" : id},
			type: 'POST',
			success : function(data){
				$('#questionListing').html('');
				debugger;
				console.log(data);
				var questions = JSON.parse(data);
				for (j = 0; j < questions.length; j++) {
					debugger;
					var arr = questions[j];
					console.log(arr);
					var question = arr[0];
					var questionID = arr[1];
					var assessmentID = arr[2];
					//<li class="list-group-item">Dummy
					
					$('#questionListing').append('<li class="list-group-item" id="listItem_'+questionID+'">'+question+'<button type="button" class="btn btn-danger pull-right" style="padding:0px;" id="deleteQuestion" onclick="deleteQuestion('+questionID+');">Delete</button><input type="hidden" id="assessmentID_'+questionID+'" value="'+assessmentID+'"</li>');
				}
			},
			error : function(data){
				$('#questionListing').html('');
				$('#phpMsges').append('<span>Some Error has occured</span>');
				$('#phpMsges').show();
			},
			statusCode : {
				404: function(){
					alert("page not found");
				}
			}
		}) 
	).then(function( data, textStatus, jqXHR ) {
		$('#editQModal').modal('toggle');
		$('#editQModal').show();
	});
	
	//assessmentAddQuestionAjaxCall(id);
	debugger;
	
}
function assessmentAddQuestionAjaxCall(){
	var data = {
			assessmentID : $('#assessmentID').val(),
			question : $('#question').val(),
			option1 : $('#option1').val(),
			option2 : $('#option2').val(),
			option3 : $('#option3').val(),
			option4 : $('#option4').val()
		};
		$replaceHTML = $('#modalBody').html();
	$.ajax({
			url : 'addQuestion.php',
			data : data,
			type: 'POST',
			
			success : function(data){
				debugger;
				$('#modalBody').html('');
				$('#modalBody').append(data);
				//$('#closeNotice').removeAttr('disabled');
				refreshNoticeboard();
				setTimeout(function() {
					$('#addQModal').modal('toggle');
					$('#modalBody').html($replaceHTML);
					//$('#addNotice').removeAttr('disabled');
				}, 1500);
			},
			error : function(data){
				$('#modalBody').html('');
				$('#modalBody').append(data);
				setTimeout(function() {
					$('#addQModal').modal('toggle');
					//$('#addNotice').removeAttr('disabled');
				}, 1500);
			},
			statusCode : {
				404: function(){
					alert("page not found");
				}
			}
		});
}
function assessmentEditQuestionAjaxCall(){
	var data = {
			assessmentID : $('#assessmentID').val(),
			question : $('#question').val(),
			option1 : $('#option1').val(),
			option2 : $('#option2').val(),
			option3 : $('#option3').val(),
			option4 : $('#option4').val()
		};
		$replaceHTML = $('#modalBody').html();
	$.ajax({
			url : 'addQuestion.php',
			data : data,
			type: 'POST',
			
			success : function(data){
				debugger;
				$('#modalBody').html('');
				$('#modalBody').append(data);
				//$('#closeNotice').removeAttr('disabled');
				refreshNoticeboard();
				setTimeout(function() {
					$('#addQModal').modal('toggle');
					$('#modalBody').html($replaceHTML);
					//$('#addNotice').removeAttr('disabled');
				}, 1500);
			},
			error : function(data){
				$('#modalBody').html('');
				$('#modalBody').append(data);
				setTimeout(function() {
					$('#addQModal').modal('toggle');
					//$('#addNotice').removeAttr('disabled');
				}, 1500);
			},
			statusCode : {
				404: function(){
					alert("page not found");
				}
			}
		});
}
function populateDiscover() {
	$('#container').html('');
	$('#container').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:red;padding-top:2%;"></i></center>');
	 $.ajax({
		url : 'discover.php',
		data:{"id":"#container"},
		type: 'GET',

		success: function(data){
			setTimeout(function() {
				$('#container').html('');
				$('#container').html(data);
			}, 2000);
			
		}
	});
}
function populateManageNoticeBoard() {
	$('#container').html('');
	$('#container').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:red;padding-top:2%;"></i></center>');
	 $.ajax({
        url : 'manageNoticeBoard.php',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            setTimeout(function() {
				$('#container').html('');
				$('#container').html(data);
			}, 2000);
        }
    });
}
function populateCollegeProfile() {
	$('#previouslySelectedCourses').hide();
	$('#previouslySelectedCoursesHeading').hide();
	var html = $('#container').html();
	$('#container').html('');
	 $.ajax({
        url : 'college-profile.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
			$.ajax({
					url : 'fetchCollegeDetails.php',
					data: data,
					type: 'POST',
					
					success : function(data){
						//debugger;
						console.log(data);
						var ar = JSON.parse(data);
						console.log(ar);
						$('#collegeName').attr('value',ar.collegeName);
						$('#collegeName').attr('disabled','disabled');
						$('#collegeEmail').attr('value',ar.collegeEmail);
						$('#collegeEmail').attr('disabled','disabled');
						$('#collegeDesc').text(ar.collegeDesc);
						$('#collegeAddress').text(ar.collegeAddress);
						$('#collegePhone').attr('value',ar.collegePhone);
						if(ar.coursesOffered != false){
							var coursesHTML = '';
							coursesHTML+=('<p style="color:red;">');
							for (var val of ar.coursesOffered){
								coursesHTML+=(val+'<br/>');
								//$('#formError').show();
								
							}
							coursesHTML+='</p>';
						}
						$('#previouslySelectedCourses').append(coursesHTML);
						$('#previouslySelectedCourses').show();
						$('#previouslySelectedCoursesHeading').show();
						//$('#coursesOffered').attr('value',ar.coursesOffered);
						console.log(ar.coursesOffered);
						return
						
					},
					error : function(data){
						$('#phpMsges').html('');
						$('#phpMsges').append(data);
						$('#phpMsges').show();
					},
					statusCode : {
						404: function(){
							alert("page not found");
						}
					}
				});
        }
    });
}
function updateProfileDetails() {
	var data = {
		collegeDesc : $('#collegeDesc').val(),
		collegeBrochure : $('#collegeBrochure').val(),
		collegeAddress : $('#collegeAddress').val(),
		collegePhone : $('#collegePhone').val(),
		coursesOffered : $('#coursesOffered').val()
	}
	console.log(data);
	$.ajax({
		url : 'updateCollegeProfile.php',
		data: data,
		type: 'POST',
		
		success : function(data){
			debugger;
			var flag = true;
			console.log(data);
			populateCollegeProfile();
			alert('Profile updated successfully!');
			
		},
		error : function(data){
			$('#phpMsges').html('');
			$('#phpMsges').append(data);
			$('#phpMsges').show();
		},
		statusCode : {
			404: function(){
				alert("page not found");
			}
		}
	});
}
function populateAssessments() {
	$('#container').html('');
	$('#container').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:red;padding-top:2%;"></i></center>');
	 $.ajax({
        url : 'assessments.php',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            setTimeout(function() {
				$('#container').html('');
				$('#container').html(data);
			}, 2000);
        }
    });
}
function populateEvents() {
	$('#container').html('');
	$('#container').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:red;padding-top:2%;"></i></center>');
	 $.ajax({
        url : 'events.php',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            setTimeout(function() {
				$('#container').html('');
				$('#container').html(data);
				
			}, 2000);
			
        }
		

    });
}
function populateInvite() {
	var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'invite.php',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            setTimeout(function() {
				$('#container').html('');
				$('#container').html(data);
			}, 2000);
        }
    });
}
