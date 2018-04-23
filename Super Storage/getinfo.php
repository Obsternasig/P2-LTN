<?php
require_once "connection.php";

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}
	
	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "' GROUP BY category, brand, ports");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		echo "Kategori: " . $kompassoc['category'] . " & Mærke: " . $kompassoc['brand'];
	}
	

	echo "<button id='sealle' class='interactive b'> Se Alle </button>";

	echo "<button class='interactive b'> Rediger Enhed </button>";

mysqli_close($connection);
?>