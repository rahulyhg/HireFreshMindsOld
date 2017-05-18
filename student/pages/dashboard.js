$(document).ready(function(e){
	//block bosy load until all dynamic contents are loaded on the page
	//refreshNoticeboard();
	
});
function editJobPreference(){
	alert('This is modal');
}
function populateStudentProfile() {
	$('#previouslySelectedCourses').hide();
	$('#previouslySelectedCoursesHeading').hide();
	var html = $('#container').html();
	$('#container').html('');
	 $.ajax({
        url : 'student-profile.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
			$.ajax({
					url : 'fetchStudentProfile.php',
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

function populateDiscover() {
	var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'discover.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
        }
    });
}
function populateConnections() {
	var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'connections.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
        }
    });
}
 function populateTaskList() {
	var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'tasks.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
        }
    });
 }
 function populateJobs() {
	 var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'jobs.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
        }
    });
 }
function populateManageNoticeBoard() {
	var html = $('#container').html();
	$('#container').html('');
	
	 $.ajax({
        url : 'manageNoticeBoard.html',
        data:{"id":"#container"},
        type: 'GET',

        success: function(data){
            $('#container').html(data);
        }
    });
	
}
