<?php

	$connection = mysqli_connect('localhost', 'root', '', '4ndy_dk');

	if(!$connection){
		die("Cannot connect to database".mysqli_connect_error());
	}

?>