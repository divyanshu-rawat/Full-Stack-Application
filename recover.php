
<?php 
		// error_reporting(0);
        include 'core\init.php';
        include 'Templates\Overall_footer_Header\header.php';




?>


	<h3>Recover</h3>


<?php

	$mode_allowed  = array('username','password');

	if(isset($_GET['mode']) === true && in_array($_GET['mode'],$mode_allowed) === true )
	{
		// echo $_GET['mode'];

		
	}
	else
	{
		header('Location:index.php');
		exit();
	}

?>