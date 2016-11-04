<?php
 
 	// include './../database/connect.php';
	// echo $_SERVER['DOCUMENT_ROOT'];
 	// include $_SERVER['DOCUMENT_ROOT'] . 'LogInOut_System_Php/core/database/connect.php';


	function user_data($user_id)
	{
		
	}


	function logged_in()
	{
		return (isset($_SESSION['user_id'])) ? true:false;
	}

	function user_exists($connect,$username)
	{
		$username = sanitize($connect,$username);
		$query = mysqli_query($connect," SELECT * FROM users WHERE username = '$username'");
		$number_of_rows = mysqli_num_rows($query);
		return ($number_of_rows == 1) ? true:false; 
	}

	function user_active($connect,$username)
	{
		$username = sanitize($connect,$username);
		$query    = mysqli_query($connect," SELECT * FROM users WHERE username = '$username' AND active = 1");
		$number_of_rows = mysqli_num_rows($query);
		return ($number_of_rows == 1) ? true:false;

	}

	function  user_id_from_username($connect,$username)
	{
		$username = sanitize($connect,$username);
		$query    = mysqli_query($connect,"SELECT user_id FROM users WHERE username = '$username'");
		$q_result = mysqli_fetch_assoc($query);
		return $q_result['user_id'];
	}


	function login($connect,$username,$password)
	{
		$username = sanitize($connect,$username);
		$user_id  = user_id_from_username($connect,$username);
	    $password = md5($password);

	    $query = mysqli_query($connect, "SELECT user_id FROM users WHERE username = '$username' AND password = '$password'" );
	    $number_of_rows = mysqli_num_rows($query);
		return ($number_of_rows == 1) ? $user_id:false;
	}

?>