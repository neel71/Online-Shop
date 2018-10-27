
<?php
include "include/config.php";
session_start();

// Cart operation

if(isset($_POST['addtocart']) ){
$_SESSION['cart_count'] =0;
	if (isset($_SESSION['user_id'])) {
		$product_id = $_POST['pid'];

	 $sql = "SELECT * from cart where  ( product_id = '$product_id' 
	 		and user_id = '".$_SESSION['user_id']."') and token = '".$_SESSION['user_token']."' ";
	 $result = mysqli_query($con,$sql);
	 if(mysqli_num_rows($result)>0){
	 	echo "<div class='alert alert-danger' role='alert'>
  			<strong>Product already added in the cart !.....</strong>
  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    		<span aria-hidden='true'>&times;</span>
  			</button>
		</div>";
	 }
	 else{

	 	$pro_sql = "select * from product 
	 	where product_id = '$product_id' ";
	 	$pro_result = mysqli_query($con,$pro_sql);
	 	$rt = mysqli_fetch_array($pro_result);

	 	$pro_id= $rt['product_id'];
	 	$pro_name = $rt['product_title'];
	 	$pro_price = $rt['product_price'];
	 	$pro_image = $rt['product_image'];

	 	

	 	$sql = " INSERT INTO cart (product_id,user_id,product_title,
	 	product_image,quantity,price,total_price,token,payment)
	 	VALUES('$pro_id','".$_SESSION['user_id']."','$pro_name',
	 			'$pro_image','".'1'."','$pro_price','$pro_price',
	 			'".$_SESSION['user_token']."','".'0'."' )";
	 	$result = mysqli_query($con,$sql);
	 	if($result){
	 		$_SESSION['cart_count'] = 1;
			echo "<div class='alert alert-success' role='alert'>
					  			<strong>Product successfully added in the cart !.....</strong>
					  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    		<span aria-hidden='true'>&times;</span>
					  			</button>
							</div>";
	 	}
	 	else{
	 				echo "<div class='alert alert-warning' role='alert'>
					  			<strong>Something went wrong .....??</strong>
					  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    		<span aria-hidden='true'>&times;</span>
					  			</button>
							</div>";
	 	}

	 	
	 }
	}
	else{
		echo "<div class='alert alert-success' role='alert'>
					  			<strong>Thank you ... But you need to sign up first...</strong>
					  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    		<span aria-hidden='true'>&times;</span>
					  			</button>
							</div>";
	}
	 
}

// Cart operation

// show to cart

if(isset($_POST['showtocart']) ){
	 $sql = "SELECT * from cart where 
	 token = '".$_SESSION['user_token']."' ";
	 $result = mysqli_query($con,$sql);
	 $i=1;
	 while ($rt = mysqli_fetch_assoc($result)) {

	 	$image = $rt['product_image'];
	 	$title = $rt['product_title']; 
	 	$price = $rt['price'];
	 	echo "
	 		<div class='row'>
				<div class='col-md-3'>$i</div>
				<div class='col-md-3'>
					<img 
						src ='products_Image/$image'
						height = '100px' 
						width = '60px'
					>
				</div>
				<div class='col-md-3'>$title</div>
				<div class='col-md-3'>$. $price.00</div>
			</div>
	 	";
	 	$i++;
	 }
}
// show to cart

// cart modify
if(isset($_POST['getCartProduct'])){
	 $sql = "SELECT * from cart where  token = '".$_SESSION['user_token']."' " ;
	 $result = mysqli_query($con,$sql);
	 while ($rt = mysqli_fetch_assoc($result)) {
	 	$pro_id = $rt['product_id'];
	 	$image = $rt['product_image'];
	 	$title = $rt['product_title']; 
	 	$price = $rt['price'];
	 	$total_price = $rt['total_price'];
	 	$quantity = $rt['quantity'];
	 	$cid = $rt['cart_id'];
	 	echo "
	 		<div class='row'>
				<div class='col-md-2'><b>$title</b></div>

				<div class='col-md-2'><img src='products_Image/$image' height='90px' width='80px' >
				</div>

				<div class='col-md-2'>
					<input type='text' style='width:20' class='form-control qty' cid='$cid' id='qty-$cid'  value='$quantity' >
					<input type='hidden' class='form-control' value='$cid' disabled>
				</div>

				<div class='col-md-2'>
					
					<input type='text' class='form-control price' cid='$cid' id='price-$cid' value='$price' disabled>
				</div>

				<div class='col-md-2'>
					<input type='text'  size='10' class='form-control total' cid='$cid' id='total-$cid' value='$total_price' disabled>
				</div>

				<div class='col-md-2'>
					<div class='btn-group'>
						<a href='' class='btn btn-danger' title='Delete' id='delete_cart' cid ='$cid'><span class='glyphicon glyphicon-trash'></span></a>

						&nbsp;<a href='' class='btn btn-primary' title='Update' id='update_cart' cid='$cid' qty='$quantity'><span class='glyphicon glyphicon-ok-sign'></pan></a>
					</div>
				</div>
				
			</div>
	 	";
	 }
}
// cart modify

// cart delete

if (isset($_POST['CartDelete'])) {
	$cart_id = $_POST['cid'];

	$sql=" select * from cart where token = '".$_SESSION['user_token']."'  ";
	$res = mysqli_query($con,$sql);
	if($res){
		$sql = "DELETE from cart where cart_id= '$cart_id' ";
			$res=mysqli_query($con,$sql);
			if($res){
				$_SESSION['cart_item'] -=1;
				echo "<div class='alert alert-success' role='alert'>
							  			<strong>Cart Deleted Successfully.Please Refresh the page.....</strong>
							  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    		<span aria-hidden='true'>&times;</span>
							  			</button>
									</div>";
			}
			else{
				echo "<div class='alert alert-danger' role='alert'>
							  			<strong>Something went wrong .....??</strong>
							  		 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							  		 <span aria-hidden='true'>&times;</span>
							  			</button>
									</div>";
			}
	}
	else{
		echo "<div class='alert alert-danger' role='alert'>
					<strong>No Cart itam available.....</strong>
					</div>";
	}
	
}
// cart delete

// cart update

if (isset($_POST['UpdateCart'])) {
	$cart_id = $_POST['cid'];
	$qty =  $_POST['qty'];
	$price =  $_POST['price'];
	$total =  $_POST['total'];
	
		$sql = "UPDATE cart set quantity ='$qty',total_price='$total' where cart_id= '$cart_id' ";
			$res=mysqli_query($con,$sql);
			if($res){
				echo "<div class='alert alert-success' role='alert'>
							  			<strong>Cart Updated Successfully.</strong>
							  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    		<span aria-hidden='true'>&times;</span>
							  			</button>
									</div>";
			}
			else{
				echo "<div class='alert alert-danger' role='alert'>
							  			<strong>Something went wrong .....??</strong>
							  		 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							  		 <span aria-hidden='true'>&times;</span>
							  			</button>
									</div>";
			}
	
	
}
// cart updaet

// show amount

if (isset($_POST['show_amount'])) {
	$total;
	$amount=0;
	$sql = " SELECT * from cart where token ='".$_SESSION['user_token']."'   ";
	$res = mysqli_query($con,$sql);
	While($rt= mysqli_fetch_assoc($res)){
		$total = $rt['total_price'];
		$amount+=$total;
	}
	$_SESSION['amount'] = $amount;
	echo "
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-2'></div>
		<div class='col-md-2'></div>
		<div class='col-md-2'>
			<b style='font-size: 14px;'> Total Amount</b>
		</div>
		<div class='col-md-2'>
			<div class='alert alert-danger' role='alert'>
				<strong>$. $amount.00</strong>
			</div>;
		</div>
		<div class='col-md-2'></div>
	</div> ";	
}
// ashow amount


// badge
if (isset($_POST['getbadge'])) {
	$sql = " select count(*) as total from cart where token ='".$_SESSION['user_token']."' ";
		$res = mysqli_query($con,$sql);
		$rt = mysqli_fetch_array($res);
		$cart_count = $rt['total'];
		$_SESSION['cart_item'] =$cart_count;
		echo $_SESSION['cart_item'];

}
// badge
							