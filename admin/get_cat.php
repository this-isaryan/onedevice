<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	redirect('login.php');
	die();
}
$categories_id=get_safe_value($con,$_POST['categories_id']);
$res=mysqli_query($con,"select * from categories where id='$categories_id' and status='1'");
if(mysqli_num_rows($res)>0){
	echo $categories_id;
}else{
	echo "no";
}
?>