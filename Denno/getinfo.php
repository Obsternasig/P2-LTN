<?php
require_once "connection.php";
		
		function getColor($var) {
			if ($var <= 0) {
				return '#ffffff';
			} else if ($var == 1) {
				return '#334488';
			} else if ($var == 2) {
				return '#e95522';
			} else if ($var == 3) {
				return '#000000';
			}
		}

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}
	
	echo "<h2 class='infotekst'>Information</h2>";

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
		
		echo "<h3> Status: " . "</h3>";
		
		echo "Udlånt: " . ucfirst($kompassoc['away']);
		echo "<br>";
		echo "Ødelagt: ";
		echo ucfirst($kompassoc['broken']);
		
		echo "<h3> Kommentar: " . "</h3>";
		echo ucfirst($kompassoc['comment']);
		
		
	}
	

mysqli_close($connection);
?>