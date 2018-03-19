<?php
	$connection = mysqli_connect('localhost','root','','tilføj');

	if(!$connection){
		die("Cannot connect to database".mysqli_connect_error());
	}
?>