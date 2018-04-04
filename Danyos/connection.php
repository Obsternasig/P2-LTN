<?php
//database connection
$connection = mysqli_connect('localhost','root','','komponenter');

	if(!$connection){
		die("Could not connect to the database".mysqli_connect_error());
	}

?>