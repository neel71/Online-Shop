 $sql = "SELECT * from cart where 
	 token = '".$_SESSION['user_token']."' ";
	 $result = mysqli_query($con,$sql);
	 while ($rt = mysqli_fetch_assoc($result)) {
	 	$pro_id = $rt['product_id'];
	 	$image = $rt['product_image'];
	 	$title = $rt['product_title']; 
	 	$price = $rt['price'];
	 	$total_price = $rt['total_price'];
	 	$quantity = $rt['quantity'];

	 	echo "
	 		<div class='row'>
				<div class='col-md-2'>$title</div>

				<div class='col-md-2'><img src='products_Image/$image' height='100px' width='100px'>
				</div>

				<div class='col-md-2'>
					<input type='text' class=form-control value='$price' disabled>
					<input type='text' class=form-control value='$pro_id' disabled>
				</div>

				<div class='col-md-2'>
					<input type='text' class=form-control value='$quantity' >
				</div>

				<div class='col-md-2'>
					<input type='text' class=form-control value='$total_price' disabled>
				</div>

				<div class='col-md-2'>
					<div class='btn-group'>
						<a href='' class='btn btn-danger' title='Delete'><span class='glyphicon glyphicon-trash'></span></a>
						&nbsp;<a href='' class='btn btn-primary' title='Update'><span class='glyphicon glyphicon-ok-sign'></pan></a>
					</div>
				</div>
				
			</div>
	 	";
	 }