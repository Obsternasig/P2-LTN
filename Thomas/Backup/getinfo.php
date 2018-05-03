<?php
require_once "connection.php";
		
	function getColor($var) {
		if ($var <= 0) {
			return '#D7D7D7';
		} else if ($var == 1) {
			return '#334488';
		} else if ($var == 2) {
			return '#e95522';
		} else if ($var == 3) {
			return '#333333';
		}
	}



	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}

	if(isset($_POST['help'])) {
		$help = $_POST['help'];
	}

	if(isset($_POST['edit'])) {
		$edit = $_POST['edit'];
	}

	
	if(isset($help)) {
		echo "<div id='infodiv' class='infotekst'>";
		
			echo "<h2 class='infodo'>Velkommen!</h2>";

			echo "<p>Lorem ipsum dolor sit amet, nullam sed vestibulum ullamcorper ut, ante viverra vitae, velit in dignissim sed dui. Imperdiet metus integer ridiculus phasellus. Sem porttitor sed nunc, eros suspendisse netus lobortis lorem. Dignissim non convallis auctor maecenas blandit, amet at vulputate mollis id fermentum a, vestibulum pharetra, amet vivamus similique nullam bibendum. </p>";

			echo "<p> Lorem ipsum dolor sit amet, nullam sed vestibulum ullamcorper ut, ante viverra vitae, velit in dignissim sed dui. Imperdiet metus integer ridiculus phasellus. Sem porttitor sed nunc, eros suspendisse netus lobortis lorem. Dignissim non convallis auctor maecenas blandit, amet at vulputate mollis id fermentum a, vestibulum pharetra, amet vivamus similique nullam bibendum. </p>";
		
		echo "</div>";
	}


	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "' GROUP BY category, brand, ports");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		if($kompassoc['away'] == '1' && $kompassoc['broken'] == '0') {
				$value = 1;
				$status = "Udlånt";
			} else if($kompassoc['away'] == '0' && $kompassoc['broken'] == '1') {
				$value = 2;
				$status = "Ødelagt :(";
			} else if($kompassoc['away'] == '1' && $kompassoc['broken'] == '1') {
				$value = 3;
				$status = "Både udlånt og ødelagt :'(";
			} else {
				$value = 0;
				$status = "På lager";
			}

		echo "<h2 class='infodo'>Information</h2>";

		
		echo "<h3 class='infoover'> Kategori: " . "</h3>";
		echo "<div class='infotekst' contenteditable='false'>" . ucfirst($kompassoc['category']) . "</div>";
		
		echo "<h3 class='infoover'> Placering: " . "</h3>";
		echo "<div class='infotekst' contenteditable='false'>" . ucfirst($kompassoc['location']) . "</div>";
		
		echo "<h3 class='infoover'> Status: " . "</h3>";
		echo "<div class='infotekst' contenteditable='false' style='color: " . getColor($value) . "'>" . $status . "</div>";
		
		echo "<h3 class='infoover'> Kommentar: " . "</h3>";
		echo "<div class='infotekst' contenteditable='false'>" . ucfirst($kompassoc['comment']) . "</div>";
		
		echo "<h3 class='infoover'> Specifikationer: " . "</h3>";
		echo "<div class='infotekst' contenteditable='false'>" . ucfirst($kompassoc['specifications']) . "</div>";
	}

	
	if(isset($edit)) {
			echo "<button class='interactive b'> Færdig </button>";
			echo "<button id='editcancel' class='interactive b'> Annuller </button>";
	}
	

mysqli_close($connection);
?>