<?php

session_start();
// error_reporting(0);
 
require 'database/connect.php';
require 'functions/general_functions.php';
require 'functions/users.php';



$errors = array();

if(logged_in() === true)
{
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($connect,$session_user_id,'user_id','username','password','first_name','last_name','Email');

	if(user_active($connect,$user_data['username']) == false)
	{
		session_destroy();
		header('Location: index.php');
		exit();
	}

	# added functionality for Disable/Ban User Accounts !!!

}

?>