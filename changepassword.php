
<?php 
		// error_reporting(0);
        include 'core\init.php';
        protect_page();

        if(empty($_POST) === false)
        {

            $required_fields = array('currrent_password','password','password_again');

            foreach ($_POST as $key => $value) {
                if(empty($value) && in_array($key,$required_fields) == true)
                {
                    $errors[] = 'Field marked with an astrik are required !!';
                    break 1;
                }
       }

        if(md5($_POST['current_password']) == $user_data['password'])
        {
            echo 'fine';
        }
        else
        {
            $errors [] = "Your Current Password is incorrect !!";
        }

        print_r($errors);

    }
        include 'Templates\Overall_footer_Header\header.php';


?>
            <h1>Change Password </h1>
        <form action="" method="POST">
            <ul>
                    <li>
                        Current password*:<br>
                        <input type="text" name="current_password">
                    </li>
                    <li>
                        New Password*:<br>
                        <input type="text" name="password">
                    </li>
                    <li>
                        New Password again*:<br>
                        <input type="text" name="password_again">
                    </li>
                    <li>
                        <input type="submit" value="change password">
                    </li>

            </ul>


        </form>
   
<?php 
	
    	include 'Templates\Overall_footer_Header\footer.php';


?>