
<?php 
		// error_reporting(0);
        include 'core\init.php';
        include 'Templates\Overall_footer_Header\header.php';




?>


	<h3>Recover</h3>



<?php

	if(isset($_GET['success']) === true)
	{
		echo 'Thanks we have e-mailed you !!';
	}

else
{
	$mode_allowed  = array('username','password');

	if(isset($_GET['mode']) === true && in_array($_GET['mode'],$mode_allowed) === true )
	{
		// echo $_GET['mode'];

		if(isset($_POST['email']) === true && empty($_POST['email']) === false  )
		{
			if(email_exists($connect,$_POST['email']) === true){
					recover($connect,$_GET['mode'],$_POST['email']);
					header('Location: recover.php?success');
					exit();
			}
			else
			{
				echo '<p>Oops, we could\'t find that e-mail address </p>';
			}
		}
	?>

	<form action="" method="POST" class = "col-lg-6">
	  <div class="form-group">
	    <label for="username">Please Enter Your Email Address:</label>
	    <input type="text" class="form-control" name="email">
	  </div>

	  <button type="submit" class="btn btn-primary">Recover</button>
</form>


	<?php 


	}
	else
	{
		header('Location:index.php');
		exit();
	}

}

?>