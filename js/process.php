<?php
header('Access-Control-Allow-Origin: *');

$name = $_POST['hostname'];
$ip   = $_POST['ip'];
$mask = $_POST['mask'];
$RSPCODE = array();


$cmd  = '/var/www/html/install/scripts/gencd.sh -n '  . $name . '  -i ' . $ip . '/'.$mask. '  -e hostname='. $name ;
$output = " ";
$retval = " ";

exec("sudo $cmd", $output, $retval);
$len = count($output);
shell_exec('sleep 3');
if ($retval == 0 ){
    $RSPCODE['Result'] = "successful";
}else {
    for($i = 0; $i < $len ; $i++) {
      $RSPCODE[$i] = $output[$i];
    }
}

echo json_encode($RSPCODE);

?>