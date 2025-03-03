<?php
require('connection.inc.php');
require('functions.inc.php');

$OTP=get_safe_value($con,$_POST['OTP']);
if($OTP==$_SESSION['EMAIL_OTP']){
	unset($_SESSION['EMAIL_OTP']);
	echo "done";
}else{
	echo "no";
}
?>