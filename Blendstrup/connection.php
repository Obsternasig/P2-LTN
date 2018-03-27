<?php
//database connection
$connection = mysqli_connect('localhost','root','','komponenter');

	if(!$connection){
		die("cannot connect to database".mysqli_connect_error());
	}

?>