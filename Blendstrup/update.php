<?php

	require_once 'connection.php';
		


		$id = htmlentities($_POST['id']);

		$chocateg = $_POST['catsel'];
		$choplace = $_POST['plasel'];
		$chostatu = htmlentities($_POST['stasel']);


		if(isset($_POST['comm'])){
			$chocomme = htmlentities($_POST['comm']);
		} else {
			$chocomme = "Ingen kommentar vedlagt";
		}

		if(isset($_POST['spec'])){
			$chospeci = htmlentities($_POST['spec']);
		} else {
			$chospeci = "Ingen specifikationer angivet";
		}

				
				if(!empty($name)&&!empty($lastname)&&!empty($ID)){
					
					$query = "UPDATE komponenter SET Name='$name', Surname='$lastname', 
					Description='$description', Email='$email', Phone='$phone' WHERE ID = '$ID';";
					
   					echo $query;
					
					$results = mysqli_query($connection,$query);

					 if(!$results){
							die("Could not query the database" .mysqli_error());
					 }

			}else{
				echo "Ups, something went wrong";
			}

mysqli_close($connection);
?>