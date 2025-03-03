<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	redirect('login.php');
	die();
}
$categories_id=get_safe_value($con,$_POST['categories_id']);
$brand_id=get_safe_value($con,$_POST['brand_id']);
$res=mysqli_query($con,"select * from brands where categories_id='$categories_id' and status='1'");
if(mysqli_num_rows($res)>0){
	$html='';
	while($row=mysqli_fetch_assoc($res)){
		if($brand_id==$row['id']){
			$html.="<option value=".$row['id']." selected>".$row['brand']."</option>";
		}else{
			$html.="<option value=".$row['id'].">".$row['brand']."</option>";
		}
	}
	echo $html;
}else{
	echo "<option value=''>No Brands found</option>";
}
?>