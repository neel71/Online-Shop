<?php include_once('include/config.php'); 
session_start();
if(!isset($_SESSION['user_id'])){
	header('location: web.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	

</head>
<body>
	<!-- navbar -->
	<div class="navbar  nabvar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="web.php" class="navbar-brand">Neel Mars</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#" ><i class="fas fa-home"></i>Home</a></li>
				<li><a href="#" ><span class="glyphicon glyphicon-modal-window"></span> Product</a>
				</li>
				<li style="width: 200px; left: 10px;top: 7.5px"><input type="text" class="form-control" id="search" placeholder="Searh Keyword">
				</li>
				<li style="left: 20px;top: 7.5px">
					<button type="submit" class="btn btn-primary" id="search_btn">Search</button>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- Cart -->
				<?php

				$sql = " select count(*) as total from cart where token ='".$_SESSION['user_token']."' ";
				$res = mysqli_query($con,$sql);
				$rt = mysqli_fetch_array($res);
				$cart_count = $rt['total'];

				?>
				<li>
					<a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown" >
						<i class="fas fa-cart-plus"></i>
						&nbsp;Cart&nbsp;
						<span class="badge badge-dark" style="left: 2px;">
							<div id="item_number">
								
							</div>	
						</span>
					</a>
					<div class="panel panel-warning dropdown-menu" style="width: 400px" >
			       		<div class="panel-heading">
			       			<div class="row">
			       				<div class="col-md-3">SL No.</div>
				       			<div class="col-md-3">Product Image</div>
				       			<div class="col-md-3">Product Name</div>
				       			<div class="col-md-3">Price</div>
			       			</div>
			       		</div>
			       		<div class="panel-body">
			       			<div id="cart_product"> 
			       				<!-- <div class="row">
				       				<div class="col-md-3"></div>
					       			<div class="col-md-3"></div>
					       			<div class="col-md-3"></div>
					       			<div class="col-md-3"></div>
			       				</div> -->
			       			</div>
			       			
			       		</div>
			       		<div class="panel-footer" id="e_msg">
			       			
			       		</div>
		       		</div>
				</li>
				<!-- Carty -->

				<!-- Sign in -->
				<li >
					<!-- class="dropdown-toggle" data-toggle="dropdown" -->
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-tie"></i>
						<?php echo "Hi,".$_SESSION['user_name']; ?>
						<span class="glyphicon glyphicon-triangle-bottom"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="cart_modify.php" id="cart_modify" class="glyphicon glyphicon-shopping-cart" style="color: blue">&nbsp;Cart</a>
						</li>
						<li>
							<a href="" style="color: blue"><i class="fas fa-key"></i>&nbsp;Change Password</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="signout.php" style="color: blue"><i class="fas fa-sign-out-alt"></i>&nbsp;Sign Out</a>
						</li>
					</ul>
					
				</li>
				<!-- Sign in -->
				<!-- <li><a href="customer_reg.php" ><i class="fas fa-user-times"></i>Sign up</a></li> -->
			</ul>
		</div>
	</div>
	<!-- navbar -->
	<!-- <p><br></p> -->
	<!-- main content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-2">
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#">Brand</a></li>
					<li><a href="#">Category</a></li>
					<li><a href="#">Category</a></li>
					<li><a href="#">Category</a></li>	
					<li><a href="#">Category</a></li>
					<li><a href="#">Category</a></li>
				</div> -->
				<div id="Category_list">
					
				</div>
				<div id="Brand_list">
					<!-- Brand kora bki ace -->
				</div>
				
			</div>
			<div class="col-md-8">
				<div id="cartProduct_Msg">
					    	
				</div>
				<!-- product list -->
				<div class="panel panel-primary">
					<div class="panel-heading">
					    <h3 class="panel-title">Product</h3>
					</div>
					<div class="panel-body">
					    <div id="Product_list">
					    	
					    </div>
					</div>
					<!-- pagination -->
					<div class="row">
						<div class="col-md-12">
							<center>
								<ul class="pagination" id="pageno">
									<li><a href="">1</a></li>
									
								</ul>
							</center>
						</div>
					</div>
		<!-- pagination -->
					<div class="panel-footer">
						<div align="center">&copy;Neel Mars</div>
					</div>
				</div>
				<!-- product list -->
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>
	<!-- main content -->


</body>
</html>