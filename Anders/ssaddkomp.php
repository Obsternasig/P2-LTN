<?php

	require_once 'connection.php';
	header('Content-type: text/html; charset=utf-8');

	if(isset($_POST['category'])&&isset($_POST['brand'])){
			
			$category = htmlentities($_POST['category']);
			$brand = htmlentities($_POST['brand']);
				
				if(isset($_POST['ports'])){
					$ports = $_POST['ports'];
				}else{
					$ports = "";
				}

				if(isset($_POST['amount'])){
					$amount = $_POST['amount'];
				}else{
					$amount = "";
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
				
			
			$serialnb = "";
			$location = "";
			$comment ="";
			$speed = "";
			$type = "";
			$length = "";
		
		
		if(!empty($category)&&!empty($brand)) {

			$query = "INSERT INTO komponenter VALUES ('', '$category', '$brand', '$serialnb', '$away', '$broken', '$location', '$comment', '$ports', '$speed', '$type', '$length')";
			$results = mysqli_query($connection, $query);


				if(!$results){
					die("Cannot connect to the database" .mysqli_connect_error());
				}

			header("Location: superstorage.php");


			} else {

			echo "Something went wrong...";

			}
		}

mysqli_close($connection);

?>