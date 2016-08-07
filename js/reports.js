// Author : Lal pasha shaik
// Date   : 05-Aug-2015

// Java script to Get reports from the server.
$(document).ready(function() {
	$("#report").on("click", function(e){
		var val 	 = $('#reoprtdropdown').val();
		var progress = $('#uresult');
		var display  = $('#display');
		/*
		 * val 1 :  Last 5 logins
		 * val 2 :  Weekly Report
		 * val 3 :  System Load
		 * val 4 :  Performance data
		 */
		 progress.html( "<img src='style/loader.gif'>");

		    $.ajax({
				
		    	// AJAX call to the build server.
		    	// url: parameter will change if the build server ip is changed 
		    	// current build server ip : 192.168.1.156
		    	url: "http://192.168.1.156/reports.php",
				type: "POST",
				data: {'val': val},
				success:function(data){
					console.log(data);
					progress.html(' ');
					display.html(data);
				
			
				},
				error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
				  progress.html(' ');
				  $('#display').html("<span style='color:red'> Network error: "+xhr+"\n"+ err+ "</span>");
				}
				
			}) //Ajax

	}); // click 

});