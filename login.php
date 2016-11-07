<?php

	include 'core/init.php';
	
	logged_in_redirect();

	include 'Templates/overall_footer_Header/header.php';
	// echo $_SERVER['DOCUMENT_ROOT'] ;

?>

<?php

	if(empty($_POST) === false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// echo $username . "/" . $password;

		if((empty($username) === true ) || (empty($password) === true))
		{
			$errors[] = 'You need to enter Username and Password !';
		}
		else if (user_exists($connect,$username) === false) {
			$errors[] =  "We can't find that username !";
		}
		else if(user_active($connect,$username) === false)
		{
			$errors[] = "You haven't Activated your Account !";
		}
		else
		{
			if(strlen($password) > 32)
			{
				$errors [] = "Password too long !";
			}


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
	}

	else
	{
			$errors []= 'No data Received !'; 
	}

?>




<?php
	if(!empty($errors) === true){

?>
	<p>We tried to Log you in , but ....</p>

<?php 		
		echo output_errors($errors);

	}	
		// include 'Templates/overall_footer_Header/footer.php';
?>
