<?php
$q = strval($_GET['q']);

require_once "connection.php";

$sql = "SELECT * FROM komponenter WHERE category = '".$q."'";
$result = mysqli_query($connection, $sql);

echo "$q";
/* $kompassoc = mysqli_fetch_assoc($result);


while($row = mysqli_fetch_array($kompassoc)) {
    echo $row['category'];
	echo $row['brand'];
	echo $row['serialnb'];
} */

mysqli_close($connection);
?>