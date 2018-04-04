<?php

require_once 'connection.php';

	if(isset($_POST['first'])&&isset($_POST['last'])&&isset($_POST['email'])){
				
				$first = htmlentities($_POST['first']);
				$last = htmlentities($_POST['last']);
				$email = htmlentities($_POST['email']);
	
		function generatePIN($digits = 4){
				$i = 0;
				$pin = "";
				
			while($i < $digits){
				$pin .= mt_rand(0, 9);
				$i++;
			}
			return $pin;
		}
 
		$pin = generatePIN(4);
		
		
		$words = explode("$last", "$first");
$acronym = "" ;

foreach ($words as $w) {
  $acronym = $w[0];
}
		
		$test = "$acronym" + "$acronym1";
	
		if(!empty($first)&&!empty($last)&&!empty($email)){
			
			$query = "INSERT INTO users (initials, ltn_pin, user_first, user_last, user_email) VALUES ('$acronym', '$pin', '$first', '$last', '$email')";
			$results = mysqli_query($connection, $query);

			if(!$results){

				 die("Could not query the database" .mysqli_error()); 
			}

		header('Location: registrer.php');

		}
	
	} else {
		
		echo "Something went wrong...";
	}

mysqli_close($connection);

?>