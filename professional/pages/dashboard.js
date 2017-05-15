$(document).ready(function(e){
	//block bosy load until all dynamic contents are loaded on the page
	
});

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
