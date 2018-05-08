<?php
	
	require_once 'connection.php';
    
		if(isset($_POST['delemail'])) {

			$email = htmlentities($_POST['delemail']);

			if(!empty($email)) {

				$query = "DELETE FROM users WHERE email = '$email';";
				$results = mysqli_query($connection, $query);


					if(!$results){
						die("Cannot connect to the database" .mysqli_connect_error());
					}

			}
		}
    
    mysqli_close($connection);

?>