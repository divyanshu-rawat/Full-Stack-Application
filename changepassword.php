
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
            if(trim($_POST['password']) != trim($_POST['password_again']))
                {
                    $errors [] = "Your new passwords do not match !!!";
                }
                else if(strlen($_POST['password']) < 6)
                {
                    $errors [] = 'Your password must be at least 6 characters long !';
                }

        }
        else
        {
            $errors [] = "Your Current Password is incorrect !!";
        }

        

    }
        include 'Templates\Overall_footer_Header\header.php';


?>
<?php

if(isset($_GET['success'])){
    
    echo "Your password has been changed !!";    
}

else
{
        if(empty($_POST) === false && empty($errors) === true)
        {
            change_password($connect,$session_user_id,$_POST['password']);
            header('Location: changepassword.php?success');
        }
        else if(empty($errors) === false)
        {   
            echo output_errors($errors);
        }
?>

<div class = "container col-lg-6" style = "margin:0px;padding:0px;">
    <h4>Change Password</h4>
    <form action="" method="POST" >

      <div class="form-group">
        <label for="username">Current password *:</label>
        <input type="password" class="form-control" name="current_password">
      </div>

      <div class="form-group">
        <label for="pwd">New Password *:</label>
        <input type="password" class="form-control" name="password">
      </div>

       <div class="form-group">
        <label for="pwd">New Password again *:</label>
        <input type="password" class="form-control" name="password_again">
      </div>

      <button type="submit" class="btn btn-primary">Change Password</button>
      
    </form>

   </div>

<?php }; ?>

<?php 
	
    	// include 'Templates\Overall_footer_Header\footer.php';


?>