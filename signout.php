<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['user_token']);
unset($_SESSION['cart_count']);
unset($_SESSION['cart_item']);

header("location: web.php");

?>