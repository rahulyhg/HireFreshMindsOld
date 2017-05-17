$(document).ready(function(e){
	//block bosy load until all dynamic contents are loaded on the page
	
});

function populateCollegeAccounts(){
	$('#container').html('');
	$('#container').append('<center><i class="fa fa-spinner fa-spin" style="font-size:100px;color:red;padding-top:2%;"></i></center>');
	 $.ajax({
        url : 'collegeAccounts.php',
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

function approveAccount(collegeID){
	$.when( 
	$.ajax({
		url : 'approveCollegeAccount.php',
		data : {"collegeID" : collegeID},
		type: 'POST',
		
		success : function(data){
			//debugger;
			console.log(data);
			$('#phpMsges').append(data);
			location.href = "#phpMsges";
			
			
		},
		error : function(data){
			alert('Some Error!');
		},
		statusCode : {
			404: function(){
				alert("page not found");
			}
		}
	})
	).then(function( data, textStatus, jqXHR ) {
		populateCollegeAccounts();
	});
}

function removeAccount(id) {
	$('#collegeID').attr('value',id);
	$('#removeAccountModal').modal('toggle');
}

function removeAccountAjaxCall() {
	var collegeID = $('#collegeID').val();
	$replaceHTML = $('#modalBody').html();
	$.when( 
	$.ajax({
		url : 'removeCollegeAccount.php',
		data : {"collegeID" : collegeID},
		type: 'POST',
		
		success : function(data){
			//debugger;
			console.log(data);
			$('#modalBodyRemoveAccount').html('');
			$('#modalBodyRemoveAccount').append(data);
			//$('#closeNotice').removeAttr('disabled');
			
			
		},
		error : function(data){
			alert('Some Error!');
		},
		statusCode : {
			404: function(){
				alert("page not found");
			}
		}
	})
	).then(function( data, textStatus, jqXHR ) {
		$('#removeAccountModal').modal('toggle');
		$('#modalBodyRemoveAccount').html($replaceHTML);
		//$('#editQModal').modal('toggle');
		//$('#editQModal').show();
		setTimeout(function() {
			populateCollegeAccounts();
		}, 1500);
		
	});
}
function rejectAccount(id){
	
	alert('rejectAccount');
}