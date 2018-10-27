<?php
include "include/config.php";
session_start();

if (isset($_POST['page'])) {
	$sql = "SELECT * from product ";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
	$pageno = ceil($count/9);
	for ($i=1; $i <= $pageno ; $i++) { 
		echo"<li><a href='' page='$i' id='page'>$i</a></li>";
	}
}


if(isset($_POST['getproduct']) ){
	$limit = 9;
	if (isset($_POST['setpage'])) {
	
		$pageNo = $_POST['pageNo'];
		$start = ($pageNo * $limit) - $limit;
	}
	else{
		$start = 0;
	}
		 $sql = "select * from product order by rand() limit $start,$limit";
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

