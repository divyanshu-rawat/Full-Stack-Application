

	<div class="row">
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
	
		include 'Templates/Widgets/user_count.php';
	?>
	</div>
