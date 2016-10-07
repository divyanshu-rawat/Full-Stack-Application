<?php 

	function sanitize($connect,$data){
		return mysqli_real_escape_string($connect,$data);
	}

?>