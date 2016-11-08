
<div class="pull-right">
	<h3 style="">Login/Register</h3>

	<form action="login.php" method="POST" >
	  <div class="form-group">
	    <label for="username">username:</label>
	    <input type="text" class="form-control" name="username">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" class="form-control" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary">Log in</button>
	  <br>
	  <a class = "btn btn-primary" href="register.php" style="margin-top:5px;">Register</a>
	  <br>
	  <a class = "btn btn-success" href="recover.php?mode=username" style="margin-top:5px;">Forgot Username</a>
	  <br>
	  <a class = "btn btn-success" href="recover.php?mode=password" style="margin-top:5px;">Forgot password</a>

	</form>
	</div>