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
		
		if($kompassoc['away'] == '1' && $kompassoc['broken'] == '0') {
				$value = 1;
			} else if($kompassoc['away'] == '0' && $kompassoc['broken'] == '1') {
				$value = 2;
			} else if($kompassoc['away'] == '1' && $kompassoc['broken'] == '1') {
				$value = 3;
			} else {
				$value = 0;
			}
		
		echo "<h3 class='infoover'> Kategori: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['category']) . "</p>";
		
		echo "<h3 class='infoover'> Placering: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['location']) . "</p>";
		
		echo "<h3 class='infoover'> Status: " . "</h3>";
		
		echo "<p class='infotekst' style='" . getColor($value) . "'> Status </p>";
		
		echo "<h3 class='infoover'> Kommentar: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['comment']) . "</p>";
		
		echo "<h3 class='infoover'> Specifikationer: " . "</h3>";
		echo "<p class='infotekst'>" . ucfirst($kompassoc['specifications']) . "</p>";
	}
	

mysqli_close($connection);
?>