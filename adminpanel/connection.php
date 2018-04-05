<?php

	$connection = mysqli_connect('localhost', 'root', '', 'loginsystem');

	if(!$connection){
		die("Cannot connect to database".mysqli_connect_error());
	}

?>