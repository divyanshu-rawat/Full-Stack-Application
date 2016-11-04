
<aside id="Just_A_Random_ID">
	<?php 

		if(logged_in() === true)
		{
			// echo "Logged_in";
			include 'Templates/Widgets/loggedin.php';
		}
		else 
		{
			include 'Templates/Widgets/login.php';
		}
	
	?>
</aside>