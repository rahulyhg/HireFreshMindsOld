$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
		
		
	});
	$( function() {
			alert("Hello");
			 var availableTags = [
			  "ActionScript",
			  "AppleScript",
			  "Asp",
			  "BASIC",
			  "C",
			  "C++",
			  "Clojure",
			  "COBOL",
			  "ColdFusion",
			  "Erlang",
			  "Fortran",
			  "Groovy",
			  "Haskell",
			  "Java",
			  "JavaScript",
			  "Lisp",
			  "Perl",
			  "PHP",
			  "Python",
			  "Ruby",
			  "Scala",
			  "Scheme"
			];
			$( "#search-text" ).autocomplete({
			  source: availableTags
			});
		});
});

function submitSearch(event) {
	event.preventDefault();
	var searchText = $('#search-text').val();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "hrb";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		
	}
	//$query = "(SELECT name, college_name as type FROM student WHERE name LIKE '%zim')";


   // $result = mysqli_query($query);
   // if ($result) {
   //     while ($result = $result->fetch_assoc()) {
   //         echo"Database data like, $result['title']";
   //     }
   // }
   // else{
   //     echo "result Not found";
   // }
	
	var obj = {'searchText':'Hussain','lastname':'Kazim1'};
	//$inputs.prop("disabled", true);
	alert(searchText);
	
	// Fire off the request to /form.php
    request = $.ajax({
        url: "searchHandle.php",
        type: "post",
        data: { searchText : searchText }
    });
	
	// Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		var jsonObject = JSON.parse(response); 
		console.log(jsonObject); 
		console.log("First Name: " +jsonObject.first_name);
        console.log("Hooray, it worked!");
    });
	
	request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
	
	// Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        //$inputs.prop("disabled", false);
    });
}