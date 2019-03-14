<?php 
function create_code() {
$temp = explode(" ", microtime());
$recnum = str_replace(".", "", $temp[1].$temp[0]);

$rcode = hexdec(md5($recnum));
$code = substr($rcode, 2, 6);

$_SESSION['tmp']['captcha'][0] = $recnum;
$_SESSION['tmp']['captcha'][1] = $code;

return array($recnum, $code);
}

function verify_code($rec_num, $checkstr) {
if ($_SESSION['tmp']['captcha'][0] == $rec_num) {
$code = $_SESSION['tmp']['captcha'][1];
$_SESSION['tmp']['captcha'] = '';
return ($checkstr == $code);
}
return FALSE;
}


 ?>