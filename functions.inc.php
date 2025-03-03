<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return strip_tags(mysqli_real_escape_string($con,$str));
	}
}

function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$brand='', $not_pid='', $order_by=''){
	$sql="select product.*,categories.categories,brands.brand from product,categories,brands where product.status=1 and product.brand_id=brands.id";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	if($brand!=''){
		$sql.=" and product.brand_id=$brand";
	}
	if($not_pid!=''){
		$sql.=" and product.id!=$not_pid";
	}
	$sql.=" and product.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (product.name like '%$search_str%' || brands.brand like '%$search_str%' || product.meta_keyword like '%$search_str%') ";
	}
	$sql.=" group by product.id";
	if($order_by!=''){
		$sql.=" order by $order_by";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

function wishlist_add($con,$uid,$pid){
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
}
?>