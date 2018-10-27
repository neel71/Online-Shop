
<?php include "include/config.php";

// Customer Signup Validation
$f_name 	=  $_POST['f_name'];
$l_name 	=  $_POST['l_name'];
$email 		=  $_POST['email'];
$password 	=  $_POST['password'];
$repassword	=  $_POST['repassword'];
$mobile 	=  $_POST['mobile'];
$address 	=  $_POST['address'];

$f_name_temp;
$l_name_temp; $email_temp;$password_temp; 
$mobile_temp;$repassword_temp;$mobile_length_temp;

$name_validation  = '/^[A-Z][a-zA-Z ]+$/';
$email_validation = "/^[_a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$num_validation   =	"/^[0-9]+$/";

if ( empty($f_name) || empty($l_name) || empty($email) ||empty($password) || 
	empty($repassword) || empty($mobile) || empty($address) ) {
	echo "
		<div class='alert alert-danger' role='alert'>
  			<strong>Please Fill All Fields !.....</strong>
  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    		<span aria-hidden='true'>&times;</span>
  			</button>
		</div>
	";
}

else {
	//firstname vlidation
	if (!preg_match( $name_validation,$f_name)) {
		echo "<div class='alert alert-danger' role='alert'>
	  			<strong>$f_name is not valid. (EX. Bangladsh)</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$f_name_temp=0;
		
	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>$f_name is valid.</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$f_name_temp=1;
	}
	//firstname vlidation

	//Lartname vlidation
	if (!preg_match( $name_validation,$l_name)) {
		echo "<div class='alert alert-danger' role='alert'>
	  			<strong>$l_name is not valid. (EX. Bangladsh)</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$l_name_temp=0;

	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>$l_name is valid.</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$l_name_temp=1;
	}
	//lastname vlidation

	//email vlidation
	if (!preg_match( $email_validation,$email)) {
		echo "<div class='alert alert-danger' role='alert'>
	  			<strong>Email is not valid. (EX. demo@demo.com)</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$email_temp=0;

	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>$email is valid.</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$email_temp=1;

			// exisating email address in databese
			$sql= "select * from user_info where 
					email = '$email'";
			$result = mysqli_query($con,$sql);
			if(Mysqli_num_rows($result) == 1){
				echo "<div class='alert alert-danger' role='alert'>
					  <strong>Email already exists</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>";
					$email_temp=0;
			}
			// exisating email address in databese
			
	}
	//email vlidation

	//password vlidation
	if (strlen($password) < 9) {
		echo "<div class='alert alert-danger' role='alert'>
	  			<strong>Password is Weak</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$password_temp=0;
	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>password is Strong.</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$password_temp=1;
	}
	//password vlidation

	//repassword vlidation
	if ((strlen($password) != strlen($repassword)) || $password != $repassword ) {
		echo "<div class='alert alert-danger' role='alert'>
	  			<strong>Password is not match</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$repassword_temp = 0;
	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>password is match.</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$repassword_temp = 1;
	}
	//repassword vlidation

	//mobile vlidation
	if (!preg_match($num_validation, $mobile)) {
			echo "<div class='alert alert-danger' role='alert'>
	  			<strong>Invalid Mobile No. $mobile (ex: 0123456789)</strong>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    		<span aria-hidden='true'>&times;</span>
	  			</button>
			</div>";
			$mobile_temp=0;
	}
	else{
		// echo "<div class='alert alert-success' role='alert'>
	 //  			<strong>Mobile No. is Valid</strong>
	 //  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 //    		<span aria-hidden='true'>&times;</span>
	 //  			</button>
		// 	</div>";
			$mobile_temp=1;
	}
	//mobile vlidation

	//mobile length vlidation
	if ( (strlen($mobile) <11 ) || ( strlen($mobile)>11 ) ) {
		echo "<div class='alert alert-danger' role='alert'>
		  			<strong>Mobile No. Length should be 11 digits</strong>
		  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    		<span aria-hidden='true'>&times;</span>
		  			</button>
				</div>";
				$mobile_length_temp=0;
	}else{
		$mobile_length_temp=1;
	}
	//mobile length vlidation
	
	// echo $f_name_temp;
	// echo $l_name_temp;
	// echo $email_temp;
	// echo $password_temp;
	// echo $repassword_temp;
	// echo $mobile_temp;
	// echo $mobile_length_temp;

	// Customer Registration
	if($f_name_temp==1 && $l_name_temp==1 && $email_temp==1 && $password_temp==1 && $repassword_temp==1 && $mobile_temp==1 && $mobile_length_temp==1 ){
			$password = md5($password);
			$sql= "INSERT INTO `user_info`(`first_name`, `last_name`,
			`email`, `password`, `mobile`, `address`) 
			VALUES ('$f_name','$l_name','$email','$password','$mobile','$address')";
			$result = mysqli_query($con,$sql);
			if($result){
				echo "<div class='alert alert-success' role='alert'>
						<strong>Customer Registration Successfull.....</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
					$f_name=$l_name=$email=$password=$repassword="";
					$mobile=$address="";
			}
			else{
				echo "<div class='alert alert-danger' role='alert'>
						<strong>Customer Registration Not Successfull !.....</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
			}
		
	}
	// Customer Registration
}

// Customer Signup Validation




	
