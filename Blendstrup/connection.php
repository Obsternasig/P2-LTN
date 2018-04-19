<?php
$q = $_GET['q'];

//database connection
$connection = mysqli_connect('localhost','root','','4ndy_dk');
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}

/*
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET CHARACTER_SET utf8");
*/

mysqli_select_db($connection, "4ndy_dk");

$sql = "SELECT * FROM komponenter WHERE category = '" . $q . "'";
$result = mysqli_query($connection, $sql);


while ($row = mysqli_fetch_assoc($result)) {
	echo $row['category'];
	echo $row['brand'];
	echo $row['serialnb'];
}

?>