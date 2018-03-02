<?php

require_once '../dbconnection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])&&isset($_POST['uid'])&&isset($_POST['pwd'])){
				
				$first = htmlentities($_POST['first']);
				$last = htmlentities($_POST['last']);
				$email = htmlentities($_POST['email']);
				$uid = htmlentities($_POST['uid']);
				$pwd = htmlentities($_POST['pwd']);


		if(!empty($first)&&!empty($last)){

			$query = "INSERT INTO users VALUES ('', $first', '$last', '$email', '$uid', '$pwd')";
			$results = mysqli_query($connection, $query);

			if(!$results){

				 die("Could not query the database" .mysqli_error()); 
			}

		header("Location: ../index.php?signup=success");

		}
	
	} else {
		
		echo "Something went wrong...";
	}

mysqli_close($connection);

?>