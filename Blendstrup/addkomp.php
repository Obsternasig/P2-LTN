<?php

	require_once 'connection.php';
		

			$category = htmlentities($_POST['cate']);
			$brand = htmlentities($_POST['brand']);
			$serialnb = htmlentities($_POST['serialnb']);
				
				if(isset($_POST['location'])){
					$location = $_POST['location'];
				}else{
					$location = "";
				}

				if(isset($_POST['comment'])){
					$comment = $_POST['comment'];
				}else{
					$comment = "";
				}

				if(isset($_POST['speci'])){
					$speci = $_POST['speci'];
				}else{
					$speci = "";
				}

				if(isset($_POST['porte'])){
					$porte = $_POST['porte'];
				}else{
					$porte = "";
				}
		
				if(isset($_POST['speed'])){
					$speed = $_POST['speed'];
				}else{
					$speed = "";
				}
				
				if(isset($_POST['socket'])){
					$socket = $_POST['socket'];
				}else{
					$socket = "";
				}
				
				if(isset($_POST['type'])){
					$type = $_POST['type'];
				}else{
					$type = "";
				}

		
		
		if(!empty($category)&&!empty($brand)&&!empty($serialnb)) {

			$query = "INSERT INTO komponenter VALUES ('', '$category', '$brand', '$serialnb', '', '', '$location', '$comment', '$ports', '$speed', '$type', '$socket', '$speci')";
			$results = mysqli_query($connection, $query);

				if(!$results){
					die("Cannot connect to the database WTF" .mysqli_connect_error());
				}

			} else {

				echo "Something went wrong...";

			}

mysqli_close($connection);

?>