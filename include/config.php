<?php

$con = mysqli_connect('localhost','root','','db_online_store');

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

