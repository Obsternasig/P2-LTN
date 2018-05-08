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

			echo "<p class='tilover'>Mærke:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addbrand' contenteditable='true'></div>";

		
			echo "<p class='tilover'>Serienummer:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addserialnb' contenteditable='true'></div>";

		
			if($value == 'switch') {
				
					echo "<p class='tilover'>Porte:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addporte' contenteditable='true'></div>";
				
			} elseif($value == 'router') {
				
					echo "<p class='tilover'>Hastighed:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addhastighed' contenteditable='true'></div>";
				
			} elseif($value == 'processor' or $value == 'motherboard') {
				
					echo "<p class='tilover'>Socket:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addsocket' contenteditable='true'></div>";
				
			} elseif($value == 'sfp-modul' or $value == 'el-tavle' or $value == 'ram-blok' or $value == 'kabel') {
				
					echo "<p class='tilover'>Type:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addtype' contenteditable='true'></div>";
				
			}
		
		
			echo "<p class='tilover'>Placering:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addlocation' contenteditable='true'></div>";

		
			echo "<p class='tilover'>Kommentar:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fatfiddy' id='addcomment' contenteditable='true'></div>";
		
		
			echo "<p class='tilover'>Specifikation:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fatfiddy' id='addspeci' contenteditable='true'></div>";

		
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