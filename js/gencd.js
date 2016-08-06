// Author : Lal pasha shaik
// Date   : 05-Aug-2015

// Java script to validate build form and call php script
$(document).ready(function() {
  $("#isobutton").on("click", function(e){
    hostname = $('#hostname').val();
    ip		 = $('#ip').val();
    mask	 = $('#mask').val();
    err		 = $('#error');
    err.text('');
   
    if(hostname.length ==0 || ip.length == 0 || mask.length == 0 ){
    	err.text('Please Fill all the details');
    	return false;
    }
    
    var namexp = (/^([a-zA-Z]+\s)*[a-zA-Z0-9]+$/g);
    if(!namexp.exec(hostname)){
        err.text("Invalid hostname, only letters are allowed");
    	return false;
    }
    
    var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;  
	if(!ipformat.exec(ip)){
		err.text('Invalid IP address');
		return false;
	}
	
	if(mask < 8 || mask > 30) {
		err.text('Invalid netmask. valid entries are 8-30');
		return false;
	}
	
    $.ajax({
			url: "js/process.php",
			type: "POST",
			data: {'hostname':hostname,'ip':ip,'mask':mask},
			success:function(data){
				$('#result').html(data);
			},
			  error: function(xhr,desc,err){
				  console.log("failed with error : " + xhr + "\n"+err);
			  }
		}) //Ajax
		
		
	}); // click 

});