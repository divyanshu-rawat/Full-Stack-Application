<?php

	include 'core/init.php';
	include 'Templates/overall_footer_Header/header.php';
	// echo $_SERVER['DOCUMENT_ROOT'] ;



	if(empty($_POST) === false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// echo $username . "/" . $password;

		if((empty($username) === true ) || (empty($password) === true))
		{
			$errors[] = 'You Need to Enter Username AND Password !';
		}
		else if (user_exists($connect,$username) === false) {
			$errors[] =  "We can't find that username !";
		}
		else if(user_active($connect,$username) === false)
		{
			$errors[] = "You haven't activated your account !";
		}
		else
		{
			$login = login($connect,$username,$password);
			if($login === false)
			{
				$errors[] = "That username/password combination is incorrect !";
			}
			else 
			{
				$_SESSION['user_id'] = $login;
				header('Location: index.php');
				exit();
			}
			
		}
		
		print_r ($errors);
	}

		include 'Templates/overall_footer_Header/footer.php';
?>