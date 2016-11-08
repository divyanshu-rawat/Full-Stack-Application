<?php
 
 	// include './../database/connect.php';
	// echo $_SERVER['DOCUMENT_ROOT'];
 	// include $_SERVER['DOCUMENT_ROOT'] . 'LogInOut_System_Php/core/database/connect.php';

	function recover($connect,$mode,$email)
	{
		$mode = sanitize($connect,$mode);
		$email = sanitize($connect,$email);
		$user_data = user_data($connect,user_id_from_email($connect,$email),'user_id','first_name','username');

		if($mode == 'username'){
			email($connect,$email,'Your Username ',"Hello " . $user_data['first_name'] . "\nYour username is: " .$user_data['username'] . "\nRegards anonymous@test.com");
		}
		else if($mode == 'password'){
				$generated_password = substr(md5(rand(999, 999999)),0,8);
				// die($generated_password);

				change_password($connect,$user_data['user_id'],$generated_password);

				email($connect,$email,'Your Password ',"Hello " . $user_data['first_name'] . "\nYour new password is: " . $generated_password . "\nRegards anonymous@test.com");


			}


	}

	function update_user_info($connect,$data){

		$update = array();
		$sanitize_array = array_sanitize($connect,$data);
		// print_r($sanitize_array);

		foreach ($sanitize_array as $field=>$data)
		{
			$update [] = $field . ' = \'' . $data . '\'';
		}

		 $implode = implode(', ', $update);
		 // echo "SELECT users SET ". $implode . " WHERE user_id  = $_SESSION[user_id]";
		$query  = mysqli_query($connect,"UPDATE users SET ". $implode ." WHERE user_id  = $_SESSION[user_id]") or die (mysqli_error($connect));


		
	}





	function activate($connect,$email,$email_code){

		$email = mysqli_real_escape_string($connect,$email);
		$email_code = mysqli_real_escape_string($connect,$email_code);

		// echo $email .'<br>';
		// echo $email_code;
		$query = mysqli_query($connect, "SELECT * FROM users WHERE Email = '$email' AND Email_code = '$email_code' AND active = 0");
		
		if(mysqli_num_rows($query) == 1)
		{
			// return true;
			// echo 'true';
			mysqli_query($connect,"UPDATE users SET active = 1 WHERE Email = '$email'");
			return true;


		}
		else
		{
			return false;
			// echo 'false';
		}

	}



	function email($connect,$to,$subject,$body){

		// tp://www.toolheap.com/test-mail-server-tool/
		//  best tool eer used this to configure wamp to swnd mail's

		mail($to,$subject,$body,'From:divyanshu.r46956@gmail.com');



	}



	function change_password($connect,$user_id,$password)
	{
		$user_id = (int) $user_id;
		$password = md5($password);

		mysqli_query($connect,"UPDATE users SET password = '$password' WHERE user_id = '$user_id'");
	}


	function register_user($connect,$data){

		$sanitize_array = array_sanitize($connect,$data);
		$sanitize_array['password'] = md5($sanitize_array['password']);
		// print_r($sanitize_array);

		$fields = '`'.implode('`,`',array_keys($sanitize_array)). '`';
		$data =  '\''.implode('\',\'',$sanitize_array). '\'';
		
		$query  = mysqli_query($connect,"INSERT INTO `users` ($fields) VALUES ($data)") or die (mysqli_error($connect));


		email($connect,$sanitize_array['Email'],'Activate your Account',"Hello " . $sanitize_array['first_name'] . ",\nYou Need to Activate your account , so use the link below:\nhttp://localhost/LogInOut_System_Php/activate.php?email=".$sanitize_array['Email']."&email_code=".$sanitize_array['Email_Code']."\n\nRegards anonymous@test.com");

	}





	function user_count($connect){

		$query = mysqli_query($connect, "SELECT * FROM users WHERE active = 1");
		$num_rows = mysqli_num_rows($query);
		return $num_rows;

	}



	function user_data($connect,$user_id)
	{
		$data = array();
		$user_id = (int) $user_id;

		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		unset($func_get_args[0]);
		// print_r ($func_get_args);

		if($func_num_args > 1)
		{
			unset($func_get_args[1]);
			$fields = '`'. implode('` , `', $func_get_args).'`';

			$data = mysqli_query($connect, "SELECT $fields FROM users WHERE user_id  = $user_id");

			// echo "SELECT $fields FROM users WHERE user_id  = $user_id";

			$result = mysqli_fetch_assoc($data);
			// echo $data_array['first_name'];
			return $result;
		}

		// echo $fields;


	}


	function logged_in()
	{
		return (isset($_SESSION['user_id'])) ? true:false;
	}

	function user_exists($connect,$username)
	{
		$username = sanitize($connect,$username);
		// echo $username;
		$query = mysqli_query($connect," SELECT * FROM users WHERE username = '$username'");
		$number_of_rows = mysqli_num_rows($query);
		// echo $number_of_rows;
		return ($number_of_rows == 1) ? true:false; 
	}

	function email_exists($connect,$email)
	{
		$email = sanitize($connect,$email);
		// echo $username;
		$query = mysqli_query($connect," SELECT * FROM users WHERE email = '$email'");
		$number_of_rows = mysqli_num_rows($query);
		// echo $number_of_rows;
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

	function  user_id_from_email($connect,$email)
	{
		$username = sanitize($connect,$email);
		$query    = mysqli_query($connect,"SELECT user_id FROM users WHERE Email = '$email'");
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