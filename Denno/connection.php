<?php
//database connection
$connection = mysqli_connect('localhost','root','','4ndy_dk');
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}

mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET CHARACTER_SET utf8");

?>