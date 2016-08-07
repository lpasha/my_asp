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

	 $('#result').html( "<img src='style/loader.gif'>");
    $.ajax({
		
    	// AJAX call to the build server.
    	// url: parameter will change if the build server ip is changed 
    	// current build server ip : 192.168.1.156
    	url: "http://192.168.1.156/process.php",
		type: "POST",
		data: {'hostname':hostname,'ip':ip,'mask':mask},
		success:function(json){
			$('#isobutton').attr('disabled','disabled');
		  $.each(JSON.parse(json),function(i,item){
			if(item == "successful"){
				imgurl = "http://192.168.1.156/generated/iso/"+hostname+".iso";
				$('#result').html("<span style='color:green'> Bootable iso generated, click the Download link to save the iso image</span><br><a href="+imgurl+"> Download</a>");
			}else{
				console.log(item);
				$('#result').html("<span style='color:red'>Error while generating iso:</span> <br>"+item);
			}
		  })
		},
		error: function(xhr,desc,err){
		  console.log("failed with error : " + xhr + "\n"+err);
		  $('#result').html("<span style='color:red'> Network error: "+xhr+"\n"+ err+ "</span>");
		}
		
	}) //Ajax
		
		
 }); // click 

});