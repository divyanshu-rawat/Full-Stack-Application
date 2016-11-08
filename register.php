

<?php include 'core\init.php';


	logged_in_redirect();
?>



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




           

<?php

	if(isset($_GET['success']))
	{
		echo "You have been registed successfully !! Please check your email to activate !!!";
	}
# save this version in git !!!!
	else
	{
		if(empty($_POST) === false && empty($errors) === true)
			{	
				$register_data = array(
					'username'  => $_POST['username'],
					'password'  => $_POST['password'],
					'first_name' => $_POST['first_name'],
					'last_name'  => $_POST['last_name'],
					'Email'     => $_POST['email'],
					'Email_Code' => md5($_POST['username'] + microtime())
					);

				register_user($connect,$register_data);
				header('Location: register.php?success');
				exit();


			}
			else if(empty($errors) === false){
				echo output_errors($errors);
			}
		
	


	
?>
 
<div class  = "container col-lg-6" >
 <h3>Register</h3>

<form action="" method="post">
	  <div class="form-group">
	    <label for="username">username *:</label>
	    <input type="text" class="form-control" name="username">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password *:</label>
	    <input type="password" class="form-control" name="password">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password again *:</label>
	    <input type="password" class="form-control" name="password_again">
	  </div>
	  <div class="form-group">
	    <label for="pwd">First Name *:</label>
	    <input type="text" class="form-control" name="first_name">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Last Name *:</label>
	    <input type="text" class="form-control" name="last_name">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Email *:</label>
	    <input type="email" class="form-control" name="email">
	  </div>
	  <button type="submit" class="btn btn-primary">Register</button>
	</form>
  
 </div>
 <?php } ?>      
<?php 
	// include 'Templates\Overall_footer_Header\footer.php';
?>