
<?php 
		// error_reporting(0);
        include 'core\init.php';
        logged_in_redirect();
        include 'Templates\Overall_footer_Header\header.php';
    	

		if(isset($_GET['success']) === true )
		{
?>
				<h4>Thanks, we have activated your account !!!</h4>
				<p>And you can Login Now !!</p>
<?php 
		}
    	else if(isset($_GET['email'],$_GET['email_code']) === true)
    	{
    		$email = trim($_GET['email']);
    		$email_code = trim($_GET['email_code']);

    		// echo $email;
    		// echo $email_code;

    		if(email_exists($connect,$email) === false)
    		{
    			$errors [] = 'Oops, something went wrong , and we could not find that email address !!';

    		}
    		elseif (activate($connect,$email,$email_code) === false)
    		{
    			$errors [] = "We had problems activating your account !!"."<br> May be you have already activated your account !!";
    		}
    		if(empty($errors) === false)
    		{
    			echo output_errors($errors);
    		}
    		else
    		{
    			header('Location: activate.php?success');
    			exit();
    		}
    	}
    	else
    	{
    		header('Location:index.php');
    		exit();
    	}

    	// print_r($errors);


    	// include 'Templates\Overall_footer_Header\footer.php';
?>