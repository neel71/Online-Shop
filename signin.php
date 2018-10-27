<?php

include('include/config.php');
session_start();
if ( isset($_POST['userlogin']) ){
	$email = mysqli_real_escape_string($con,$_POST['user_email']) ;
	$password = md5($_POST['user_password']);
	$token = rand(0,1000000);
	//echo $token;
	$sql= "select * from user_info where token = '$token' ";
	$result = mysqli_query($con,$sql);
	if($result){
		echo 'Token is matched';
	}else{
		$_SESSION['user_token']=$token;
		$sql = "SELECT * from user_info where email='$email' and password='$password' ";
			$result = mysqli_query($con,$sql);
			
			if (mysqli_num_rows($result) >0 ) {
				$rt = mysqli_fetch_array($result);
				$_SESSION['user_id'] = $rt['user_id'];// 
				$_SESSION['user_email'] = $rt['email'];// 
				$_SESSION['user_name'] = $rt['first_name'];//

				$login_sql = "INSERT INTO user_login(email, token) VALUES ('".$_SESSION['user_email']."','".$_SESSION['user_token']."')";
				$result_sql = mysqli_query($con,$login_sql);
				echo "true";
			}
			else{
				echo "Provide Right Information !!!!!";
			}
	}
	
}
	
