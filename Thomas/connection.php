<?php
//database connection
$connection = mysqli_connect('localhost','root','','4ndy_dk');

	if(!$connection){
		die("Could not connect to the database".mysqli_connect_error());
	}

?>