<?php

	$connect_error = 'Sorry , We are experiencing downtime !';
	$connect = mysqli_connect('localhost', 'root', '') or die($connect_error);
	mysqli_select_db($connect,'login_register');

	// $query = mysqli_query($connect,"SELECT user_id FROM users WHERE username = 'divyanshu'");
	// // $q_result = mysqli_fetch_assoc($query);
	// $number_of_rows = mysqli_num_rows($query);

	// echo $number_of_rows;
?>