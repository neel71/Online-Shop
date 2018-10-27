<?php
include "include/config.php";
session_start();

// category from database
if(isset($_POST['category'])){

	$sql = "select * from category";
	$result = mysqli_query($con,$sql);

	echo"
		<ul class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'>Category</a></li>
	";

	if(mysqli_num_rows($result) > 0){
		while($rt = mysqli_fetch_assoc($result)){
		$cat_id =  $rt['cat_id'];
		$cat_name =  $rt['cat_title'];
		echo"

			<li><a href='#' class='category' cid='$cat_id'>$cat_name</a></li>
		";
		}
	echo "</ul>";								
	}

}// category from database


// product from database
if(isset($_POST['product']) ){
	 $sql = "select * from product order by rand() limit 0,9";
	 $result = mysqli_query($con,$sql);
	 if(mysqli_num_rows($result) > 0){
	 	while($rt = mysqli_fetch_assoc($result)){
	 	$product_id =  $rt['product_id'];
	 	$product_cat =  $rt['product_cat'];
	 	$product_brand =  $rt['product_brand'];
	 	$product_title =  $rt['product_title'];
	 	$product_price =  $rt['product_price'];
	 	$product_image =  $rt['product_image'];
		echo"
			<div class='col-md-4'>
				<div class='panel panel-info'>
					<div class='panel-heading'>$product_title</div>
					<div class='panel-body'>
					<img 
					src ='products_Image/$product_image'
								height = '200px' 
							    width = '200px'
							    >
				</div>
				<div class='panel-footer'> <span style='font-size: 20px'>$$product_price.00 </span>
						<button pid='$product_id' style='float: right' id='product' class='btn btn-danger btn-xs' >AddToCart</button>
				<!-- <p style='font-size: 15px' class='pull-right'></p> -->
					</div>
			</div>
		</div>
		";
		}								
	}
}
// product from database

// product according to category 
if(isset($_POST['get_product_by_category']) ){
	$cid = $_POST['cat_id'];
	//echo json_encode($cid);
	 $sql = "select * from product where product_cat='$cid' ";
	 $result = mysqli_query($con,$sql);
	  if(mysqli_num_rows($result) > 0){
	 	while($rt = mysqli_fetch_array($result)){
	 	$product_id =  $rt['product_id'];
	 	$product_cat =  $rt['product_cat'];
	 	$product_brand =  $rt['product_brand'];
	 	$product_title =  $rt['product_title'];
	 	$product_price =  $rt['product_price'];
	 	$product_image =  $rt['product_image'];
		echo"
			<div class='col-md-4'>
				<div class='panel panel-success'>
					<div class='panel-heading'>$product_title</div>
					<div class='panel-body'>
					<img 
					src ='products_Image/$product_image'
								height = '200px' 
							    width = '200px'
							    >
				</div>
				<div class='panel-footer'> <span style='font-size: 20px'>$$product_price.00 </span>
						<button pid='$product_id' style='float: right' id='product' class='btn btn-danger btn-xs' >AddToCart</button>
				<!-- <p style='font-size: 15px' class='pull-right'></p> -->
					</div>
			</div>
		</div>
		";
		}								
	}
	else{
		echo"
		<div class='alert alert-warning'>
		<span style='color:red'>SORRY!!!<br>Item Not Available.....</span>
		</div>
		";
	}
}
// product according to category

// Brand List from database
 if(isset($_POST['brand']) ){
 	if(isset($_POST['cat_id'])){
 		$cid = $_POST['cat_id'];
 		$sql = "select * from brand where cat_id = '$cid' ";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0){
			echo"
				<ul class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#''>Brand</a></li>
			";
			while($rt = mysqli_fetch_assoc($result)){
			$brand_id =  $rt['brand_id'];
			$brand_name =  $rt['brand_title'];
			echo"
				<li><a href='#' class='brand' bid ='$brand_id'>$brand_name</a></li>
			";
			}
			echo "</ul>";								
		}
 	}	
} 
// Brand List from database

// product according to Brand
if(isset($_POST['get_product_by_brand']) ){
	$bid = $_POST['brand_id'];
	//echo json_encode($cid);
	 $sql = "select * from product where product_brand='$bid' ";
	 $result = mysqli_query($con,$sql);
	  if(mysqli_num_rows($result) > 0){
	 	while($rt = mysqli_fetch_array($result)){
	 	$product_id =  $rt['product_id'];
	 	$product_cat =  $rt['product_cat'];
	 	$product_brand =  $rt['product_brand'];
	 	$product_title =  $rt['product_title'];
	 	$product_price =  $rt['product_price'];
	 	$product_image =  $rt['product_image'];
		echo"
			<div class='col-md-4'>
				<div class='panel panel-success'>
					<div class='panel-heading'>$product_title</div>
					<div class='panel-body'>
					<img 
					src ='products_Image/$product_image'
								height = '200px' 
							    width = '200px'
							    >
				</div>
				<div class='panel-footer'> <span style='font-size: 20px'>$$product_price.00 </span>
						<button pid='$product_id' id='product' style='float: right' class='btn btn-danger btn-xs' >AddToCart</button>
				<!-- <p style='font-size: 15px' class='pull-right'></p> -->
					</div>
			</div>
		</div>
		";
		}								
	}
	else{
		echo"
		<div class='alert alert-success'>
		<span style='color:red'>SORRY!!!<br>This Brand Not Available.....</span>
		</div>
		";
	}
}
// product according to Brand


// product according to keyword
if(isset($_POST['get_product_by_keyword']) ){
	$keyword = $_POST['key'];
	//echo json_encode($cid);
	 $sql = "select * from product where product_keyword like '%$keyword%'";
	 $result = mysqli_query($con,$sql);
	  if(mysqli_num_rows($result) > 0){
	 	while($rt = mysqli_fetch_array($result)){
	 	$product_id =  $rt['product_id'];
	 	$product_cat =  $rt['product_cat'];
	 	$product_brand =  $rt['product_brand'];
	 	$product_title =  $rt['product_title'];
	 	$product_price =  $rt['product_price'];
	 	$product_image =  $rt['product_image'];
		echo"
			<div class='col-md-4'>
				<div class='panel panel-success'>
					<div class='panel-heading'>$product_title</div>
					<div class='panel-body'>
					<img 
					src ='products_Image/$product_image'
								height = '200px' 
							    width = '200px'
							    >
				</div>
				<div class='panel-footer'> <span style='font-size: 20px'>$$product_price.00 </span>
						<button pid='$product_id' id='product' style='float: right' class='btn btn-danger btn-xs' >AddToCart</button>
				<!-- <p style='font-size: 15px' class='pull-right'></p> -->
					</div>
			</div>
		</div>
		";
		}								
	}
	else{
		echo"
		<div class='alert alert-danger'>
		<span style='color:red'>SORRY!!!<br>This Product Not Available.....</span>
		</div>
		";
	}
}
// product according to keyword









					
				