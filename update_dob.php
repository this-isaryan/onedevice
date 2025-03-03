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
$dob=get_safe_value($con,$_POST['dob']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"update users set dob='$dob' where id='$uid'");
echo "Your Date of Birth updated";
?>