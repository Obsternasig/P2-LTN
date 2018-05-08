<?php
	
	require_once 'connection.php';
	header('Content-type: text/html; charset=utf-8');
    
    if(isset($_POST['delemail'])) {

			$email = htmlentities($_POST['delemail']);
		
		if(!empty($email)) {

			$query = "DELETE FROM users WHERE email = $email";
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