<?php include_once('include/config.php'); 
session_start();
require_once('./config.php');
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
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

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
			</ul>
		</div>
	</div>
	<!-- navbar -->
	<!-- Caontainer -->
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div id="cart_err">
						
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="penel panel-info">
					<div class="panel-heading"><span style="color: black; font-size: 20px; font-weight: bold;">Cart Caheckout</span></div>
					<div class="panel-body">
						<!--heading-->
						<div class="row">
							
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Product Name</span></div>
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Product Image</span></div>
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Quantity</span></div>
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Product Price in $.</span></div>
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Total Price in $.</span></div>
							<div class="col-md-2"><span style="font-weight: bold;font-size: 16px;">Action</span></div>
						</div>
						<!--heading-->
						<br>
						<!-- body -->
						<div id="cart_Body">
							
						</div>
						<!-- body -->
						
							<div id="cart_amount">
							</div>
							<hr>
							<?php

							if ($_SESSION['cart_item'] >=1) {
							?>
							<form action="test.php" method="post">
								  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								  data-key="<?php echo $stripe['publishable_key']; ?>"data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
								  data-description="Online Payment"
								  data-name="Neel Mars"
								  data-amount="PayBill"
								  data-locale="auto"></script>
							</form>
							
								
							<?php
							}
							?>
							
						
						
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<a href="profile.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			</div>
		</div>
	</div>
	<!-- Caontainer -->

</body>