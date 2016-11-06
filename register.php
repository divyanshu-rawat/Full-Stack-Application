

<?php include 'core\init.php';?>
<?php include 'Templates\Overall_footer_Header\header.php';

	if(empty($_POST) === false)
	{
		$required_fields = array('username','password','password_again','first_name','email');
		foreach ($_POST as $key => $value) {
			if(empty($value) && in_array($key,$required_fields) === true)
			{
				$errors[] = 'Field marked with an astrik are required !!';
				break 1;
			}
		}

		// print_r($errors);
		// print_r($required_fields);
		// echo "<br>";
		// print_r($_POST);

		if(empty($errors) === true)
			if(user_exists($connect,$_POST['username']) === true)
			{
				$errors [] = 'Sorry , the username \' '.htmlentities($_POST['username']) . '\' is already taken . ';
			}

			if (preg_match("/\\s/",$_POST['username']) == true) {
				$errors [] = "Your username must not contain spaces !";
			}

			if(strlen($_POST['password']) < 6)
			{
				$errors [] = "Your password must be atleast 5 characters long !";
			}

			if($_POST['password'] !== $_POST['password_again'])
			{
				$errors [] = "Your password do not match !";
			}

			if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
			{
				$errors [] = "A valid email address is required !!";
			}
			if(email_exists($connect,$_POST['email']) == true)
			{
				$errors [] = 'Sorry , the email \' '.htmlentities($_POST['email']) . '\' is already in use  . ';
			}

	}

	// print_r($errors);


?>




            <h1>Register</h1>

<?php

	if(empty($_POST) === true && empty($errors) === true)
	{

	}
	else {
		echo output_errors($errors);
	}

?>
            
<form action="" method="post">
			
<ul>
	
	<li>
		username*:<br>
		<input type="text" name="username">
	</li>

	<li>
		Password*<br>
		<input type="password" name="password">
	</li>

	<li>
		Password again*<br>
		<input type="password" name="password_again">
	</li>

	<li>
		First Name*<br>
		<input type="text" name="first_name">
	</li>

	<li>
		Last Name*<br>
		<input type="text" name="last_name">
	</li>

	<li>
		Email*<br>
		<input type="text" name="email">
	</li>

	<li>
		<input type="submit" value="register">
	</li>
</ul>

</form>
        
<?php include 'Templates\Overall_footer_Header\footer.php';?>