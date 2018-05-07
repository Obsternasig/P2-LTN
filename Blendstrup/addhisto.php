<?php
	
	require_once 'connection.php';


	if(isset($_POST['name'])&&isset($_POST['serialnb'])&&isset($_POST['event'])) {
			
			$name = htmlentities($_POST['name']);
			$serialnb = htmlentities($_POST['serialnb']);
			$event = htmlentities($_POST['event']);
			
			$date = date("Y-m-d");
		
		if(!empty($name)&&!empty($serialnb)&&!empty($event)) {

			$query = "INSERT INTO history VALUES ('', '$date', '$name', '$event', '$serialnb')";
			$results = mysqli_query($connection, $query);


			if(!$results){
				die("Cannot connect to the database" .mysqli_connect_error());
			}

		}
	}

mysqli_close($connection);

?>