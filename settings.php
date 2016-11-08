

<?php 
        include 'core\init.php';

        protect_page();

        include 'Templates\Overall_footer_Header\header.php'; 
    
        // include 'Templates\Overall_footer_Header\footer.php';

   if(empty($_POST) === false)
    {
              $required_fields = array('first_name','email');
              
              foreach ($_POST as $key => $value)
               {
                  if(empty($value) && in_array($key,$required_fields) === true)
                  {
                      $errors[] = 'Field marked with an astrik are required !!';
                      break 1;
                  }
                }
                if(empty($errors) === true)
                {

                    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
                        {
                          $errors [] = "A valid email address is required !!";
                        }
                    else if(email_exists($connect,$_POST['email']) == true && $user_data['Email'] != $_POST['email'])
                        {
                            $errors [] = 'Sorry , the email \' '.htmlentities($_POST['email']) . '\' is already in use  . ';
                        }
                    
                }

 
    }   


?>

<h4>Settings</h4>

<?php

  if(empty($_POST) === false && empty($errors) === true)
  {

    
  }

  else if( empty($errors) === false)
  {
       echo output_errors($errors);
  }

?>

<form action="" method="POST" >
      <div class="form-group">
        <label for="username">First Name *:</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $user_data['first_name'];?>">
      </div>

      <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $user_data['last_name'];?>">
      </div>

      <div class="form-group">
        <label for="email">Email *:</label>
        <input type="text" class="form-control" name="email" value="<?php echo $user_data['Email'];?>">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <br>
      <br>

    </form>