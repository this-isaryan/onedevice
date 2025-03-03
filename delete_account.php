<?php
require('connection.inc.php');
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
// $uid=get_safe_value($con,$_POST['uid']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"DELETE FROM `users` WHERE `users`.`id` = '$uid';");
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_EMAIL']);
header('location:index.php');
die();
echo "Your Account has been Deleted";
?>