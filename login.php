<?php

	include 'core/init.php';
	
	// echo $_SERVER['DOCUMENT_ROOT'] ;



	if(empty($_POST) === false)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// echo $username . "/" . $password;

		if((empty($username) == true ) || (empty($password) == true))
		{
			echo 'You Need to Enter Username AND Password !';
		}
		else if (user_exists($connect,$username) == false) {
			echo "We can't find that username !";
		}
		else if (user_exists($connect,$username) == true) {
			echo "<br>"."Welcome ". $username;
		}
		else
		{
			$login = login($username,$password);
			if($login == false)
			{
				echo "That username/password combination is incorrect !";
			}
			else 
			{
					
			}
			
		}
		
		
	}

?>