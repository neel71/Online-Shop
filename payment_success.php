<?php include_once('include/config.php'); 
session_start();?>
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
			</ul>
		</div>
	</div>
	<!-- navbar -->
	<!-- Caontainer -->
	<div class="container-fluid">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<h3><b>Thank You</b></h3>
					<hr>
					<p style="font-size: 16px">
						Hello <span style="font-weight: bold;font-size: 20px"><?php echo $_SESSION['user_name']; ?></span>, Your payment Process is successfully completed.<br>you can continue shopping.......
					</p>
					<center><a href="profile.php" class="btn btn-success btn-large">Continue Shopping</a></center>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<!-- Caontainer -->

</body>