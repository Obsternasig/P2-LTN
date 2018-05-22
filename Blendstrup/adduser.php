<?php
	
	require_once 'connection.php';
	header('Content-type: text/html; charset=utf-8');
			
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

			$query = "INSERT INTO users VALUES ('$initials', '$pin', '$firstname', '$lastname', '$email', '', '')";
			$results = mysqli_query($connection, $query);


				if(!$results){
					die("Cannot connect to the database" .mysqli_connect_error());
				}
			
			$pinkode = $initials . $pin;
			$subject = "Din pinkode til Lan Team Nord's lagersystem";
			$txt = "Hej " . $firstname . " " . $lastname . "\n\nDin pinkode til Lan Team Nord\'s lagersystem lyder: " . $pinkode . "\n\nMed venlig hilsen,\nLan Team Nord";
			$headers = 'From: webmaster@4ndy.dk' . "\r\n" . 'Reply-To: webmaster@4ndy.dk' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

				mail($email, $subject, $txt, $headers);
			
			}
		}

mysqli_close($connection);

?>