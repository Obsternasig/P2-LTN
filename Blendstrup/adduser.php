<?php
	
	require_once 'connection.php';

			
	function initials($first, $last) {
			$firstini = mb_substr($first, 0, 1, 'utf-8');
			$lastini = mb_substr($last, 0, 1, 'utf-8');
		
			$initials = $firstini . $lastini;
		
			return $initials;
		}
	
	function generatePIN($digits = 4){
				$i = 0;
				$pin = "";
				
			while($i < $digits){
				$pin .= mt_rand(0, 9);
				$i++;
			}
			return $pin;
		}


	

	if(isset($_POST['addfirstname'])&&isset($_POST['addlastname'])&&isset($_POST['addemail'])) {
			
			$firstname = htmlentities($_POST['addfirstname']);
			$lastname = htmlentities($_POST['addlastname']);
			$email = htmlentities($_POST['addemail']);
		
			$pin = generatePIN(4);
			$initials = initials($firstname, $lastname);
	
		
		if(!empty($firstname)&&!empty($lastname)&&!empty($email)) {

			$query = "INSERT INTO users VALUES ('$initials', '$pin', '$firstname', '$lastname', '$email', '')";
			$results = mysqli_query($connection, $query);


				if(!$results){
					die("Cannot connect to the database" .mysqli_connect_error());
				}

			header("Location: adaptivegrid.php");


			} else {

			echo "Something went wrong...";

			}
		}

mysqli_close($connection);

?>