<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['username']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from admin_users where username='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$_SESSION['ADMIN_LOGIN']='yes';
	$_SESSION['ADMIN_USERNAME']=$email;
	
	echo "valid";
}else{
	echo "Incorrect Login Details";
}
?>