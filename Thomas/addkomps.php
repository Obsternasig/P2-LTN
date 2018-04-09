<?php
	require_once '../projekt/connection.php';
	

	if(isset($_POST['kategori'])&&isset($_POST['brand'])){
			
			$kategori = htmlentities($_POST['kategori']);
			$brand = htmlentities($_POST['brand']);
				
				if(isset($_POST['porte'])){
					$porte = $_POST['porte'];
				}else{
					$porte = "";
				}

				if(isset($_POST['broken'])){
					$antal = $_POST['broken'];
				}else{
					$antal = "";
				}

				if(isset($_POST['serial'])){
					$away = $_POST['serial'];
				}else{
					$away = "";
				}

				if(isset($_POST['away'])){
					$broken = $_POST['away'];
				}else{
					$broken = "";
				}
	
		
		if(!empty($kategori)&&!empty($brand)) {

			$query = "INSERT INTO komponent VALUES ('$kategori', '$brand', '$porte', '$broken', '$serial', '$away', '')";
			$results = mysqli_query($connection, $query);


				if(!$results){
					die("Cannot connect to the database" .mysqli_connect_error());
				}

			header("Location: items.php");


			} else {

			echo "Something went wrong...";

			}
		}

mysqli_close($connection);

?>