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
				return '#303030';
			}
		}

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}

	if(isset($_POST['searched'])) {
		$searched = $_POST['searched'];
	}


	if(isset($id)) {
		
		$komp = mysqli_query($connection, "SELECT * FROM komponenter WHERE ID LIKE '" . $id . "'");
		
	}

		$kompassoc = mysqli_fetch_assoc($komp);


		$category = $kompassoc['category'];
		switch($category) {
			case $category == "switch": $speci = 'ports'; $chospec = $kompassoc['ports'];
					break;
			case $category == "router": $speci = 'speed'; $chospec = $kompassoc['speed'];
					break;
			case $category == "sfp-modul": $speci = 'type'; $chospec = $kompassoc['type'];
					break;
			case $category == "el-tavle": $speci = 'type'; $chospec = $kompassoc['type'];
					break;
			case $category == "ram-blok": $speci = 'type'; $chospec = $kompassoc['type'];
					break;
			case $category == "processor": $speci = 'socket'; $chospec = $kompassoc['socket'];
					break;
			case $category == "kabel": $speci = 'type'; $chospec = $kompassoc['type'];
					break;
			case $category == "motherboard": $speci = 'socket'; $chospec = $kompassoc['socket'];
					break;

				default: $speci = ""; $chospec = "";
			}
		
		//OR category OR brand

		if(isset($searched)&&!empty($searched)&&is_numeric($searched)) {
		
			$komps = mysqli_query($connection, "SELECT * FROM komponenter WHERE category LIKE'" . $category . "' AND brand LIKE '" . $kompassoc['brand'] . "' AND " . $speci . " LIKE '" . $chospec . "' AND serialnb LIKE '%$searched%'");
			
		} elseif(isset($searched)&&!empty($searched)) {

			$komps = mysqli_query($connection, "SELECT * FROM komponenter WHERE category LIKE'" . $category . "' AND brand LIKE '" . $kompassoc['brand'] . "' AND " . $speci . " LIKE '" . $chospec . "' OR category OR brand LIKE '%$searched%'");
			
		} else {
			
			$komps = mysqli_query($connection, "SELECT * FROM komponenter WHERE category LIKE'" . $category . "' AND brand LIKE '" . $kompassoc['brand'] . "' AND " . $speci . " LIKE '" . $chospec . "'");
		}
		

		while ($row = mysqli_fetch_assoc($komps)) {
			
			if($row['away'] == '1' && $row['broken'] == '0') {
				$away = 1;
			} else if($row['away'] == '0' && $row['broken'] == '1') {
				$away = 2;
			} else if($row['away'] == '1' && $row['broken'] == '1') {
				$away = 3;
			} else {
				$away = 0;
			}
			
				echo "<div id='" . $row['ID'] . "' class='komps' style='color: " . getColor($away) . "'>";
				/* echo "<input type='checkbox' id='komps-check' name='komps-check'>"; */
				echo "<p>Serienummer: </p>" . $row['serialnb'] . " " . "<p id='komps-p'>Placering: </p>" . $row['location'] . " ";
				echo "</div>";
			
			echo "<br>";
		}
	

mysqli_close($connection);
?>