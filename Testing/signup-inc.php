h<?php

require_once '../dbconnection.php';

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
		
		
		$string = "$first";

		
		function initials ($str) {
			$ret = '';
    			
			foreach (explode(' ', $str) as $word)
        	$ret .= strtoupper($word[0]);
    	
			return $ret;
		}
		
		
		if(!empty($first)&&!empty($last)&&!empty($email)){
			
			$query = "INSERT INTO users (initials, ltn_pin, user_first, user_last, user_email) VALUES ('$string', '$pin', '$first', '$last', '$email')";
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