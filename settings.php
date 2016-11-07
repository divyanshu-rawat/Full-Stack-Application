

<?php 
        include 'core\init.php';

        protect_page();

        include 'Templates\Overall_footer_Header\header.php'; 
    
        // include 'Templates\Overall_footer_Header\footer.php';


?>


<form action="" method="POST" >
      <div class="form-group">
        <label for="username">First Name:</label>
        <input type="text" class="form-control" name="first_name" placeholder="<?php echo $user_data['first_name'];?>">
      </div>

      <div class="form-group">
        <label for="pwd">Last Name:</label>
        <input type="text" class="form-control" name="last_name" placeholder="<?php echo $user_data['last_name'];?>">
      </div>

      <div class="form-group">
        <label for="pwd">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="<?php echo $user_data['Email'];?>">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <br>
      <br>

    </form>
