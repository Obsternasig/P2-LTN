<?php

	$connection = mysqli_connect('4ndy.dk:3306', '4ndy.dk', '5NqbanU6+/Sz', '4ndy_dk');

	if(!$connection){
		die("Cannot connect to database".mysqli_connect_error());
	}

?>