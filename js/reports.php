<?php
header('Access-Control-Allow-Origin: *');

$val  = $_POST['val'];

switch ($val) {
	case 1:
		lastfive();
		break;
	case 2:
		weekly();
		break;
	case 3:
		sysload();
		break;
	case 4:
		perfdata();
		break;
	
}

function lastfive(){
  	$output1 = shell_exec('last | head -5 | sed -e "s/$/<br>/" -e "s/ /\&nbsp;/g"');
   	$host = shell_exec('uname -n');
	echo "<h2> Last 5 logins on : $host </h2><p> $output1 </p>";
}

function weekly() {
	$retval = 1;
	$output = " ";
	$cmd = '/var/www/html/install/scripts/ASP-OEL-USR.sh';
	exec("sudo $cmd", $output, $retval);
	$host = shell_exec('uname -n');
	if ($retval == 0) {
	  echo "<h2> Weekly Report Generated on : $host </h2> <p> Please click on download link to view or save the report. <br> <a target='_blank'  href='http://192.168.1.156/generated/iso/userlogin_logs.pdf'> Download </a> </p>";

	 }else {
 	    echo "<span style='color:red> Error while running weekly report.</span> <br> $output";

	 }
}

function sysload() {
	
	$output = shell_exec('sar -q | sed -e "s/$/<br>/" -e "s/ /\&nbsp;\&nbsp;/g"');
	$host   = shell_exec('uname -n');
	echo "<h2> System Load of the server : $host </h2> <br>  <p> $output </p> ";

}

function perfdata() {
	$output = shell_exec('top -b -o %CPU -n1 | head | sed -e "s/$/<br>/" -e "s/ /\&nbsp;/g" ');
	$host 	= shell_exec('uname -n');
	echo "<h2> Performance Data of : $host </h2> <br> <p> $output </p>";
}