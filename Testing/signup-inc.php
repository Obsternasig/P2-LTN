<?php

require_once '../dbconnection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])){
				
				$first = htmlentities($_POST['first']);
				$last = htmlentities($_POST['last']);
				$email = htmlentities($_POST['email']);


		if(!empty($first)&&!empty($last)&&!empty($email)){

			$query = "INSERT INTO users (user_id, user_first, user_last, user_email) VALUES ('$first', '$last', '$email')";
			$results = mysqli_query($connection, $query);

			if(!$results){

				 die("Could not query the database" .mysqli_error()); 
			}

		header("Location: 'index-test.php");

		}
	
	} else {
		
		echo "Something went wrong...";
	}

mysqli_close($connection);

?>