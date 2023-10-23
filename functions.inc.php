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

function get_safe_value($str){
	global $con;
	$str= mysqli_real_escape_string($con,$str);
	return $str;
	}
	
function get_product($con,$limit='',$cat_id='',$product_id=''){
	$sql=" select dress.*,category.dress_category from dress,category where dress.status=1  ";
	if($cat_id!=''){
		$sql.=" and dress.category_id=$cat_id ";
	}if($product_id!=''){
		$sql.=" and dress.id=$product_id ";
	}
	$sql.="and dress.category_id=category.id order by dress.id  desc  ";

if($limit!=''){
	$sql.="limit $limit";
}

  $res=mysqli_query($con,$sql);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)){
  $data[]=$row;

	}
	return $data;
}
?>