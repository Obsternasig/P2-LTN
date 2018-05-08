<?php
require_once "connection.php";
		
	function getColor($var) {
		if ($var <= 0) {
			return '#D7D7D7';
		} else if ($var == 1) {
			return '#334488';
		} else if ($var == 2) {
			return '#e95522';
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
				$staway = "selected='selected'";
			} else if($kompassoc['away'] == '0' && $kompassoc['broken'] == '1') {
				$value = 2;
				$status = "Ødelagt :(";
				$stabro = "selected='selected'";
			} elseif($kompassoc['away'] == '0' && $kompassoc['broken'] == '0') {
				$value = 0;
				$status = "På lager";
				$sta = "selected='selected'";
			} else {
				$sta = "";
				$staway = "";
				$stabro = "";
			}
		
		
		$category = $kompassoc['category'];
		switch($category) {
			case $category == "switch": $catover = "Porte:"; $catspec = $kompassoc['porte'];
					break;
			case $category == "router": $catover = "Hastighed:"; $catspec = $kompassoc['hastighed'];
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
		
		
		
		echo "<h2 class='infodo'>Information</h2>";

		echo "<button id='editbutt' class='interactive b'> Rediger enhed </button>";
		
		echo "<h3 class='infoover' id='catover'>" . nl2br($catover) . "</h3>";
		echo "<div class='infotekst' id='incated' contenteditable='false'>" . nl2br(ucfirst($catspec)) . "</div>";
		
		
		echo "<h3 class='infoover'> Placering: </h3>";
		echo "<div class='infotekst' id='inplaced' contenteditable='false'>" . nl2br(ucfirst($kompassoc['location'])) . "</div>";
		
		
		echo "<h3 class='infoover'> Status: </h3>";
		echo "<div class='infotekst' id='instated' style='color: " . getColor($value) . "'>" . $status . "</div>";
			echo "<select size='1' id='instatedsel' class='editdrop' style='display: none;'>";
				echo "<option value='lager' $sta>På lager</option>";
				echo "<option value='broken' $stabro>Ødelagt</option>";
				echo "<option value='away' $staway>Udlånt</option>";
			echo "</select>";
		
		
		echo "<h3 class='infoover'> Kommentar: </h3>";
		echo "<div class='infotekst' id='incommed' contenteditable='false'>" . nl2br(ucfirst($kompassoc['comment'])) . "</div>";
		
		echo "<h3 class='infoover'> Specifikationer: </h3>";
		echo "<div class='infotekst' id='inspeced' contenteditable='false'>" . nl2br(ucfirst($kompassoc['specifications'])) . "</div>";
		
		echo "<input type='hidden' id='hiddenserialnb' value='" . $kompassoc['serialnb'] . "'>";
	}

	
	if(isset($edit)) {
			echo "<button id='editdone' class='interactive b'> Færdig </button>";
			echo "<button id='editcancel' class='interactive b'> Annuller </button>";
	}
	

mysqli_close($connection);
?>