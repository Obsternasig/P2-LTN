<?php
//database connection
$connection = mysqli_connect('localhost','root','','4ndy_dk');

	if(!$connection){
		die("Could not connect to the database".mysqli_connect_error());
	}

mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET CHARACTER_SET utf8");

?>