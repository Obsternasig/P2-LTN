<?php

	require_once 'connection.php';

		$id = $_POST['id'];

		//$chocateg = $_POST['catsel'];
		$choplace = $_POST['plasel'];
		$chostatu = $_POST['stasel'];


			if($chostatu == 'lager') {

				$broken = '0';
				$away = '0';

			} elseif($chostatu == 'broken_away') {

				$broken = '1';
				$away = '1';

			} elseif($chostatu == 'broken') {

				$broken = '1';
				$away = '0';

			} elseif($chostatu == 'away') {

				$broken = '0';
				$away = '1';
			}


		$category = $_POST['catover'];
		$category = str_replace(':', '', $category);


		if(isset($_POST['comm'])&&!empty($_POST['comm'])){
			$chocomme = htmlentities($_POST['comm']);
		} else {
			$chocomme = "Ingen kommentar angivet";
		}

		if(isset($_POST['spec'])&&!empty($_POST['spec'])){
			$chospeci = htmlentities($_POST['spec']);
		} else {
			$chospeci = "Ingen specifikationer angivet";
		}

		if(isset($_POST['catspec'])&&!empty($_POST['catspec'])){
			$catspec = htmlentities($_POST['catspec']);
		} else {
			$catspec = "";
		}


			if(!empty($id)){

				$query = "UPDATE komponenter SET " . $category . " = '$catspec', location = '$choplace', away = '$away', broken = '$broken', comment = '$chocomme', specifications = '$chospeci' WHERE ID = '$id';";

				$results = mysqli_query($connection, $query);

				if(!$results){
					die("Could not query the database" .mysqli_error());
				}

			} else {
					
				echo "Ups, something went wrong";
			}


mysqli_close($connection);
?>