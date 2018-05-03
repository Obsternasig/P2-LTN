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
				
			if(isset($_POST['serialnb'])){
					$serialnb = $_POST['serialnb'];
				}else{
					$serialnb = "";
				}
			
			if(isset($_POST['location'])){
					$location = $_POST['location'];
				}else{
					$location = "";
				}
				
				if(isset($_POST['comment'])){
					$comment = $_POST['comment'];
				}else{
					$comment ="";
				}
				
				if(isset($_POST['speed'])){
					$speed = $_POST['speed'];
				}else{
					$speed = "";
				}
			
				if(isset($_POST['specification'])){
					$specification = $_POST['specification'];
				}else{
					$specification = "";
				}
				
				if(isset($_POST['length'])){
					$length = $_POST['length'];
				}else{
					$length = "";
				}
				
				if(isset($_POST['type'])){
					$type = $_POST['type'];
				}else{
					$type = "";
				}
			
			
			
			
		
		
		if(!empty($category)&&!empty($brand)) {

			$query = "INSERT INTO komponenter VALUES ('', '$category', '$brand', '$serialnb', '$amount', '$away', '$broken', '$location', '$comment', '$ports', '$speed', '$type', '$length', '$specification')";
			$results = mysqli_query($connection, $query);


				if(!$results){
					die("Cannot connect to the database WTF" .mysqli_connect_error());
				}

			header("Location: adaptivegrid.php");


			} else {

			echo "Something went wrong...";

			}
		}

mysqli_close($connection);

?>