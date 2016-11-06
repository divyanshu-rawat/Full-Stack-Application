<?php 

	function logged_in_redirect(){

		if(logged_in() === true)
		{
			header('Location: index.php');
			exit();
		}
	}

	function protect_page(){

		if(logged_in() === false)
		{
			header('Location:protected.php');
			exit();
		}
	}

	function  array_sanitize($connect,$data)
	{
		foreach ($data as $key => $value) {
 		{
 			mysqli_real_escape_string($connect,$data[$key]);
 		}

 		return $data;
	}
	}
	function sanitize($connect,$data){
		return mysqli_real_escape_string($connect,$data);
	}


	function  output_errors($errors)
	{
		$output = array();

		foreach ($errors as $error) {
			$output[] = '<li>' . $error . '</li>';
		}

		return '<ul>' . implode('',$output) . '</ul>';
	}



?>

<!-- # Give us the tools to build the future we dream.
# internet is  our largest shared resource .
# the wb needed nurturing . -->