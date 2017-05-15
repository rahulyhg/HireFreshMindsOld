$(document).ready(function(e){
	//block bosy load until all dynamic contents are loaded on the page
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
