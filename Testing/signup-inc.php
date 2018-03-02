<?php

require_once '../dbconnection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])&&isset($_POST['uid'])&&isset($_POST['pwd'])){
				
				$first = mysql_real_escape_string($_POST["first"]);
				$last = mysql_real_escape_string($_POST["last"]);
				$email = mysql_real_escape_string($_POST["email"]);
				$uid = mysql_real_escape_string($_POST["uid"]);
				$pwd = mysql_real_escape_string($_POST["pwd"]);


		if(!empty($first)&&!empty($last)){

			$query = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ($first', '$last', '$email', '$uid', '$pwd')";
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