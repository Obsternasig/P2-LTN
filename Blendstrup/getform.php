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
			echo "<option value='sfp-modul'>SFP Modul</option>";
			echo "<option value='el-tavle'>El tavle</option>";
			echo "<option value='ram-blok'>Ram blok</option>";
			echo "<option value='processor'>Processor</option>";
			echo "<option value='motherboard'>Motherboard</option>";
			echo "<option value='kabel'>Kabel</option>";
		echo "</select>";

		echo "<button id='addcancel' class='interactive b'> Annuller </button>";
	}

	if(isset($value) && $value != '0') {
		
		echo "<div class='naddkomp'>";

			echo "<p class='infoover'>Mærke:</p>";
			echo "<input type='text' name='addbrand' id='addbrand' maxlength='50'>";

		
			echo "<p class='infoover'>Serienummer:</p>";
			echo "<input type='text' name='addserialnb' id='addserialnb' maxlength='50'>";

		
			if($value == 'switch') {
				
				echo "<div class='naddporte'>";
					echo "<p class='infoover'>Porte:</p>";
					echo "<input type='text' name='addports' id='addports' maxlength='30'>";
				echo "</div>";
				
			} elseif($value == 'router') {
				
				echo "<div class='naddspeed'>";
					echo "<p class='infoover'>Hastighed:</p>";
					echo "<input type='text' name='addspeed' id='addspeed' maxlength='30'>";
				echo "</div>";
				
			} elseif($value == 'processor' or $value == 'motherboard') {
				
				echo "<div class='naddtype'>";
					echo "<p class='infoover'>Socket:</p>";
					echo "<input type='text' name='addsocket' id='addsocket' maxlength='30'>";
				echo "</div>";
				
			} elseif($value == 'sfp-modul' or $value == 'el-tavle' or $value == 'ram-blok' or $value == 'kabel') {
				
				echo "<div class='naddsocket'>";
					echo "<p class='infoover'>Type:</p>";
					echo "<input type='text' name='addtype' id='addtype' maxlength='30'>";
				echo "</div>";
				
			}
		
		
			echo "<p class='infoover'>Placering:</p>";
			echo "<input type='text' name='addlocation' id='addlocation' maxlength='50'>";

		
			echo "<p class='infoover'>Kommentar:</p>";
			echo "<input type='text' name='addcomment' id='addcomment' maxlength='250'>";
		
		
			echo "<p class='infoover'>Specifikation:</p>";
			echo "<input type='text' name='addspeci' id='addspeci' maxlength='250'>";

		
			echo "<div class='naddkomp'>";
		
				echo "<input type='submit' id='addok' class='interactive b' value='OK'>";
		
			echo "</div>";
		
		echo "</div>";
	}

	
	if(isset($admin)) {
		echo "<button id='histobutt' class='interactive b'> Historik </button>";
			
		echo "<button id='userbutt' class='interactive b'> Brugere </button>";
	}


mysqli_close($connection);
?>