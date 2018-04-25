<?php
require_once "connection.php";

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}


	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "'");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		$komps = mysqli_query($connection, "SELECT * FROM komponenter WHERE category LIKE'" . $kompassoc['category'] . "' AND brand LIKE '" . $kompassoc['brand'] . "'");
		
		while ($row = mysqli_fetch_assoc($komps)) {
			echo "Serienummer: " . $row['serialnb'] . " ";
			echo "<br>";
		}
		
	}
	

mysqli_close($connection);
?>