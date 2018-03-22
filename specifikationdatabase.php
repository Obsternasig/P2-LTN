<?php
	require_once 'specifikationconnection.php';


	if(isset($_POST['navn'])&&isset($_POST['lokation'])&&isset($_POST['antal'])&&isset($_POST['beskrivelse'])) {

			$navn = htmlentities($_POST['navn']);
			$lokation = htmlentities($_POST['lokation']);
			$antal = htmlentities($_POST['antal']);
			$beskrivelse = htmlentities($_POST['beskrivelse']);
	
		
	if(!empty($navn)&&!empty($lokation)&&!empty($antal)&&!empty($beskrivelse)) {

		$query = "INSERT INTO dingenoter ('ltn_navn', 'ltn_lokation', 'ltn_antal', 'ltn_beskrivelse') VALUES ('$navn', '$lokation', '$antal', '$beskrivelse')";
		
		$results = mysqli_query($connection, $query);

		
			if(!$results){
				die("cannot connect to database" .mysqli_connect_error());
			}
		}
		else {
		
		echo "Something went wrong...";
	}
	}
mysqli_close($connection);
	
?>