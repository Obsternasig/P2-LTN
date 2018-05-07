<?php
	require_once "connection.php";

$name = $_POST['name'];
$serialnb = $_POST['serialnb'];
$action = $_POST['action'];

$histo = mysql_query('INSERT  INTO history');






	mysqli_close($connection);
?>