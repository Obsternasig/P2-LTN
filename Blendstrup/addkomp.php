<?php
	require_once 'connection.php';
	

	if(isset($_POST['kategori'])&&isset($_POST['brand'])){
			
			$kategori = htmlentities($_POST['kategori']);
			$brand = htmlentities($_POST['brand']);
				
				if(isset($_POST['porte'])){
					$porte = $_POST['porte'];
				}else{
					$porte = "";
				}

				if(isset($_POST['antal'])){
					$antal = $_POST['antal'];
				}else{
					$antal = "";
				}

				if(isset($_POST['away'])){
					$away = $_POST['away'];
				}else{
					$away = "";
				}

				if(isset($_POST['broken'])){
					$broken = $_POST['broken'];
				}else{
					$broken = "";
				}
	
		
		if(!empty($kategori)&&!empty($brand)) {

			$query = "INSERT INTO switches VALUES ('$kategori', '$brand', '$porte', '$antal', '$away', '$broken', '')";
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