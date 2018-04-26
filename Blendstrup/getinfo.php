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
	
	echo "<h2 class='infodo'>Information</h2>";


	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "' GROUP BY category, brand, ports");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		echo "<h3 class='infoover'> Kategori: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['category']) . "</p>";
		
		echo "<h3 class='infoover'> Mærke: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['brand']) . "</p>";
		
		echo "<h3 class='infoover'> Placering: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['location']) . "</p>";
		
		echo "<h3 class='infoover'> Status: " . "</h3>";
		
		echo "Udlånt: " . ucfirst($kompassoc['away']);
		echo "<br>";
		echo "Ødelagt: ";
		echo ucfirst($kompassoc['broken']);
		
		echo "<h3 class='infoover'> Kommentar: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['comment']) . "</p>";
		
		
	}
	

mysqli_close($connection);
?>