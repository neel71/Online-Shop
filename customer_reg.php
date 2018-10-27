<?php include_once('include/config.php'); ?>
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
				<li><a href="web.php" ><i class="fas fa-home"></i>Home</a></li>
				<li><a href="#" ><span class="glyphicon glyphicon-modal-window"></span> Product</a>
				</li>
			</ul>

			
		</div>
	</div>
	<!-- navbar -->
	<!-- <p><br></p> -->
	<!-- main content -->
	<div class="container-fluid">
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading"><span style="font-size: 20px">Customer SignUp Form</span>
					</div>
					<!-- Panel Body -->
					<div class="panel-body">
						<form method="post" id="my_form">
							<div class="row">
								<div class="col-md-6">
									<label for="f_name">First Name</label>
									<input type="text" name="f_name" id="f_name" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="l_name">Last Name</label>
									<input type="text" name="l_name" id="l_name" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email </label>
									<input type="email" name="email" id="email" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="repassword">Re-Type Password</label>
									<input type="password" name="repassword" id="repassword" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="mobile">Mobile No. </label>
									<input type="text" name="mobile" id="mobile" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address">Address </label>
									<input type="text" name="address" id="address" class="form-control">
								</div>
							</div>
							<p><br></p>
							<div class="row">
								<div class="col-md-12">
									<input type="button" value="Sign Up" name="signup_button" class="btn btn-block btn-info" id="signup_button">
								</div>
							</div>
						
					</div>
				</form>
					<div class="panel-footer"></div>
				</div>	
			</div>
			<div class="col-md-5" id="signup_msg">
							<!-- Alert from signup dorm -->
			</div>
			<div class="col-md-1"></div>
			</div><!--Row-->
			
		</div>
	
	<!-- main content -->
</body>
</html>