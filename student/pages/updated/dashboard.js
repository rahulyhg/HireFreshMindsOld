$(document).ready(function(e){
	//block bosy load until all dynamic contents are loaded on the page
	refreshNoticeboard();
	
});
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
			var noticeItems = JSON.parse(data);
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
