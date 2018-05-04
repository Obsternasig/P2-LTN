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
			return '#303030';
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


	if(isset($id)) {
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "'");
		$kompassoc = mysqli_fetch_assoc($komp);
		
		if($kompassoc['away'] == '1' && $kompassoc['broken'] == '0') {
				$value = 1;
				$status = "Udlånt";
			} else if($kompassoc['away'] == '0' && $kompassoc['broken'] == '1') {
				$value = 2;
				$status = "Ødelagt :(";
			} else if($kompassoc['away'] == '1' && $kompassoc['broken'] == '1') {
				$value = 3;
				$status = "Både udlånt og ødelagt :(";
			} else {
				$value = 0;
				$status = "På lager";
			}
		
		
		$category = $kompassoc['category'];
		switch($category) {
			case $category == "switch": $catover = "Porte:"; $catspec = $kompassoc['ports'];
					break;
			case $category == "router": $catover = "Hastighed:"; $catspec = $kompassoc['speed'];
					break;
			case $category == "sfp-modul": $catover = "Type:"; $catspec = $kompassoc['type'];
					break;
			case $category == "el-tavle": $catover = "Type:"; $catspec = $kompassoc['type'];
					break;
			case $category == "ram-blok": $catover = "Type:"; $catspec = $kompassoc['type'];
					break;
			case $category == "processor": $catover = "Socket:"; $catspec = $kompassoc['socket'];
					break;
			case $category == "kabel": $catover = "Type:"; $catspec = $kompassoc['type'];
					break;
			case $category == "motherboard": $catover = "Socket:"; $catspec = $kompassoc['socket'];
					break;

				default: $catover = "?"; $catspec = "?";
			}
		
		if($kompassoc['location'] == 'Myrdalstræde 34 C') {
				$plamyr = "selected='selected'";
			} else {
				$plamyr = "";
			}
		if($kompassoc['location'] == 'C. H. Ryders Vej 24') {
				$plach = "selected='selected'";
			} else {
				$plach = "";
			}
		if($kompassoc['location'] == 'Anden adresse') {
				$plaand = "selected='selected'";
			} else {
				$plaand = "";
			}
		
		
		
		echo "<h2 class='infodo'>Information</h2>";

		echo "<h3 class='infoover' id='catover'>" . $catover . "</h3>";
		echo "<div class='infotekst' id='incated' contenteditable='false'>" . ucfirst($catspec) . "</div>";
		
		
		echo "<h3 class='infoover'> Placering: </h3>";
		echo "<div class='infotekst' id='inplaced'>" . ucfirst($kompassoc['location']) . "</div>";
			echo "<select size='1' id='inplacedsel' class='editdrop' style='display: none;'>";
				echo "<option value='Myrdalstræde 34 C' $plamyr> Myrdalstræde 34 C </option>";
				echo "<option value='C. H. Ryders Vej 24' $plach> C. H. Ryders Vej 24 </option>";
				echo "<option value='Anden adresse' $plaand> Anden adresse </option>";
			echo "</select>";
		
		
		echo "<h3 class='infoover'> Status: </h3>";
		echo "<div class='infotekst' id='instated' style='color: " . getColor($value) . "'>" . $status . "</div>";
			echo "<select size='1' id='instatedsel' class='editdrop' style='display: none;'>";
				echo "<option value='lager'>På lager</option>";
				echo "<option value='broken'>Ødelagt</option>";
				echo "<option value='away'>Udlånt</option>";
				echo "<option value='broken_away'>Både udlånt og ødelagt</option>";
			echo "</select>";
		
		
		echo "<h3 class='infoover'> Kommentar: </h3>";
		echo "<div class='infotekst' id='incommed' contenteditable='false'>" . ucfirst($kompassoc['comment']) . "</div>";
		
		echo "<h3 class='infoover'> Specifikationer: </h3>";
		echo "<div class='infotekst' id='inspeced' contenteditable='false'>" . ucfirst($kompassoc['specifications']) . "</div>";
	}

	
	if(isset($edit)) {
			echo "<button id='editdone' class='interactive b'> Færdig </button>";
			echo "<button id='editcancel' class='interactive b'> Annuller </button>";
	}
	

mysqli_close($connection);
?>