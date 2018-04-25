<?php
require_once "connection.php";

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}
	
	echo "<h2 class='infotekst'>Information</h2>";

	echo "<button id='sealle' class='interactive b'> Se Alle </button>";

	echo "<button class='interactive b'> Rediger Enhed </button>";


	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "' GROUP BY category, brand, ports");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		echo "<h3> Kategori: " . "</h3>";
		echo ucfirst($kompassoc['category']);
		
		echo "<h3> Mærke: " . "</h3>";
		echo ucfirst($kompassoc['brand']);
		
		echo "<h3> Placering: " . "</h3>";
		echo ucfirst($kompassoc['location']);
		
		echo "<h3> Antal: " . "</h3>";
		echo "Udlånt: " . ucfirst($kompassoc['away']);
		echo "<br>";
		echo "Ødelagt: ";
		echo ucfirst($kompassoc['broken']);
		
		echo "<h3> Kommentar: " . "</h3>";
		echo ucfirst($kompassoc['comment']);
		
		
	}
	

mysqli_close($connection);
?>