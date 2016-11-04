
<?php 
		// error_reporting(0);
        include 'core\init.php';
        include 'Templates\Overall_footer_Header\header.php';


        if(isset($_SESSION['user_id']))
        {
        	// echo 'Logged In';
        }
        else
        {
        	// echo "Not Logged In !!!";
        }


?>


		
            
            <h1>Home</h1>
            
            <p>Just a template.</p>
   
<?php 
	
    	include 'Templates\Overall_footer_Header\footer.php';


?>