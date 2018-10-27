<?php include_once('include/config.php'); 
session_start();
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
				<li><a href="web.php" ><i class="fas fa-home"></i>Home</a></li>
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
				
				<!-- Carty -->

				<!-- Sign in -->
				<li >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-tie"></i>&nbsp; Sign In</a>
					<!-- <div class=""> -->
						<div class="panel panel-primary dropdown-menu" style="width: 300px">
			       			<div class="panel-heading">Login</div>
			       			<div class="panel-body">
			       				<label for="email">Email</label>
			       				<input type="email" class="form-control"  id="email" required>
			       				<label for="email">Password</label>
			       				<input type="Password" class="form-control" id="password" required>
			       				<p><br></p>
			       				<a href="#" style="list-style: none;font-size: 14px;">Forgotten Password !</a>
			       				<button type="submit" class="btn btn-success" id="login" value="Login"  style="float: right;">Login</button>
			       				<!-- <input type="button" value="Sign Up" name="signup_button" class="btn btn-block btn-info" id="signup_button"> -->
		       			
		       				</div>
				       		<div class="panel-footer" id="e_msg">
				       			<a href="customer_reg.php" ><i class="fas fa-user-times"></i>&nbsp; New Customer Sign up</a>
				       		</div>
		       			</div>
					<!-- </div> -->
				</li>
				<!-- Sign in -->
				<li></li>
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


	<!-- sign in modal-->
		<div class="modal fade" id="signinModal" >
		  <div class="modal-dialog" style="width: 35%;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" style="font-size: 20px;">Sign in </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <div class="modal-body">
		       
		      </div>
		    </div>
		  </div>
		</div>
<!-- sign in Modal -->

<!-- Cart modal-->
		<div class="modal fade" id="cartModal" >
		  <div class="modal-dialog" >
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" style="font-size: 20px;">Cart </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <div class="modal-body">
		      	<div class="panel panel-success">
		       		<div class="panel-heading">
		       			<div class="row">
		       				<div class="col-md-3">SL No.</div>
			       			<div class="col-md-3">Product Image</div>
			       			<div class="col-md-3">Product Name</div>
			       			<div class="col-md-3">Price</div>
		       			</div>
		       		</div>
		       		<div class="panel-body">
		       			
		       		</div>
		       		<div class="panel-footer" id="e_msg">
		       			
		       		</div>
		       </div>
		      </div>

		      <div class="modal-footer">
		       
		      </div>
		    </div>
		  </div>
		</div>
<!-- Cart Modal -->
</body>
</html>