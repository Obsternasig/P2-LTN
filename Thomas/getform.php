<?php
require_once "connection.php";

	if(isset($_POST['value'])) {
		$value = $_POST['value'];
	}
	
	if(isset($_POST['initial'])) {
		$initial = $_POST['initial'];
	}

	if(isset($_POST['admin'])) {
		$admin = $_POST['admin'];
	}

	if(isset($_POST['edit'])) {
		$edit = $_POST['edit'];
	}


	if(isset($initial)) {
		echo "<select size='1' id='addwhat' class='interactive'>";
			echo "<option value='0'> Vælg hvad der skal tilføjes </option>";
			echo "<option value='router'>Router</option>";
			echo "<option value='switch'>Switch</option>";
			echo "<option value='sfpmodul'>SFP Modul</option>";
			echo "<option value='eltavle'>El tavle</option>";
			echo "<option value='ramblok'>Ram blok</option>";
			echo "<option value='processor'>Processor</option>";
			echo "<option value='motherboard'>Motherboard</option>";
			echo "<option value='kabel'>Kabel</option>";
		echo "</select>";

		echo "<button id='addcancel' class='interactive b'> Annuller </button>";
	}

	if(isset($value) && $value != '0') {
		
		echo "<div class='naddkomp'>";

			echo "<p>Kategori:</p>";
			echo "<input type='text' name='category' id='addinfo' maxlength='50'>";

			echo "<p>Brand:</p>";
			echo "<input type='text' name='brand' id='addinfo' maxlength='50'>";

			echo "<p>Serienummer:</p>";
			echo "<input type='text' name='serialnb' id='addinfo' maxlength='50'>";

			echo "<p>Lokation:</p>";
			echo "<input type='text' name='location' id='addinfo' maxlength='50'>";

			echo "<p>Kommentar:</p>";
			echo "<input type='text' name='comment' id='addinfo' maxlength='250'>";


			if($value == 'switch'){
			echo "<div class='naddporte'>";
				echo "<p>Porte:</p>";
				echo "<input type='text' name='ports' id='addinfo' maxlength='30'>";
			echo "</div>";
			} elseif($value == 'router'){
			echo "<div class='naddspeed'>";
				echo "<p>Hastighed:</p>";
				echo "<input type='text' name='speed' id='addinfo' maxlength='30'>";
			echo "</div>";
			} elseif($value == 'processor' or $value == 'motherboard') {
			echo "<div class='naddtype'>";
				echo "<p>Socket:</p>";
				echo "<input type='text' name='socket' id='addinfo' maxlength='30'>";
			echo "</div>";
			} elseif($value == 'sfpmodul' or $value == 'eltavle' or $value == 'ramblok' or $value == 'kabel') {
			echo "<div class='naddsocket'>";
				echo "<p>Type:</p>";
				echo "<input type='text' name='type' id='addinfo' maxlength='30'>";
			echo "</div>";
			}

		
			echo "<div class='naddkomp'>";
				echo "<input type='submit' id='ok' value='OK'>";
			echo "</div>";
		echo "</div>";
	}

	
	if(isset($admin)) {
		echo "<button id='histobutt' class='interactive b'> Historik </button>";
			
		echo "<button id='userbutt' class='interactive b'> Brugere </button>";
	}

	
	if(isset($edit)) {
		
		echo "<div id='canceladd'>";
		echo "<button id='addcancel' class='interactive b'> Annuller </button>";
		
		echo "<div class='editkomp'>";
			echo "<form name='editform' id='editform' method='post' action='editData.php' autocomplete='on'>";
			echo "<p>Kategori:</p>";
			echo "<input type='text' name='category' id='addinfo' maxlength='50'>";

			echo "<p>Brand:</p>";
			echo "<input type='text' name='brand' id='addinfo' maxlength='50'>";

			echo "<p>Serienummer:</p>";
			echo "<input type='text' name='serialnb' id='addinfo' maxlength='50'>";

			echo "<p>Lokation:</p>";
			echo "<input type='text' name='location' id='addinfo' maxlength='50'>";

			echo "<p>Kommentar:</p>";
			echo "<input type='text' name='comment' id='addinfo' maxlength='250'>";


			echo "<div class='neditkomp'>";
				echo "<input type='submit' id='ok' value='OK'>";
				echo "</form>";
			echo "</div>";
			
		echo "</div>";
		echo "</div>";
	}


mysqli_close($connection);
?>