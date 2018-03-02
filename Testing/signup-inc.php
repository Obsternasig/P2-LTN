<?php

require_once '../dbconnection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])&&isset($_POST['uid'])&&isset($_POST['pwd'])){
				
				$first = htmlentities($_POST['first']);
				$last = htmlentities($_POST['last']);
				$email = htmlentities($_POST['email']);
				$uid = htmlentities($_POST['uid']);
				$pwd = htmlentities($_POST['pwd']);


		if(!empty($first)&&!empty($last)&&!empty($email)&&!empty($uid)&&!empty($pwd)){

			$query = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd')";
			$results = mysqli_query($connection, $query);

			if(!$results){

				 die("Could not query the database" .mysqli_error()); 
			}

		header("Location: ../index.php");

		}
	
	} else {
		
		echo "Something went wrong...";
	}

mysqli_close($connection);

?>