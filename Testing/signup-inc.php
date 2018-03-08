<?php

require_once '../dbconnection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])){
				
				$first = htmlentities($_POST['first']);
				$last = htmlentities($_POST['last']);
				$email = htmlentities($_POST['email']);
	

<<<<<<< HEAD
		/* function generatePIN($digits = 4){
    		$i = 0; //counter
			$pin = ""; //Default pin is blank.
				
				while($i < $digits){
					//Generates a random number between 0 and 9.
					$pin .= mt_rand(0, 9);
					$i++;
				}
			return $pin;
		}
		
		$pin = generatePIN(4);
		*/
		
		if(!empty($first)&&!empty($last)&&!empty($email)&&!empty($pin)){

			$query = "INSERT INTO users (user_first, user_last, user_email) VALUES ('', '$first', '$last', '$email', '')";
=======
		
		function generatePIN($digits = 4){
				$i = 0;
				$pin = "";
				
			while($i < $digits){
				$pin .= mt_rand(0, 9);
				$i++;
			}
			return $pin;
		}
 
		$pin = generatePIN();
		
		
		if(!empty($first)&&!empty($last)&&!empty($email)){

			$query = "INSERT INTO users (ltn_pin, user_first, user_last, user_email) VALUES ('$pin', '$first', '$last', '$email')";
>>>>>>> 8e443561e791cbb0e4b7aaf414081295e5de929f
			$results = mysqli_query($connection, $query);

			if(!$results){

				 die("Could not query the database" .mysqli_error()); 
			}

		header('Location: index-test.php');

		}
	
	} else {
		
		echo "Something went wrong...";
	}

mysqli_close($connection);

?>