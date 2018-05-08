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
	
	if(isset($_POST['adduser'])) {
		$adduser = $_POST['adduser'];
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
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addbrand' contenteditable='true'></div>";

		
			echo "<p class='infoover'>Serienummer:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addserialnb' contenteditable='true'></div>";

		
			if($value == 'switch') {
				
					echo "<p class='infoover'>Porte:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addports' contenteditable='true'></div>";
				
			} elseif($value == 'router') {
				
					echo "<p class='infoover'>Hastighed:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addspeed' contenteditable='true'></div>";
				
			} elseif($value == 'processor' or $value == 'motherboard') {
				
					echo "<p class='infoover'>Socket:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addsocket' contenteditable='true'></div>";
				
			} elseif($value == 'sfp-modul' or $value == 'el-tavle' or $value == 'ram-blok' or $value == 'kabel') {
				
					echo "<p class='infoover'>Type:</p>";
					echo "<div class='addam'></div>";
					echo "<div class='fatadd fiddy' id='addtype' contenteditable='true'></div>";
				
			}
		
		
			echo "<p class='infoover'>Placering:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addlocation' contenteditable='true'></div>";

		
			echo "<p class='infoover'>Kommentar:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addcomment' contenteditable='true'></div>";
		
		
			echo "<p class='infoover'>Specifikation:</p>";
			echo "<div class='addam'></div>";
			echo "<div class='fatadd fiddy' id='addspeci' contenteditable='true'></div>";

		
			echo "<div class='naddkomp'>";
		
				echo "<input type='submit' id='addok' class='interactive b okdu' value='OK'>";
		
			echo "</div>";
		
		echo "</div>";
	}

	
	if(isset($admin)) {
		echo "<button id='histobutt' class='interactive b'> Historik </button>";
			
		echo "<button id='userbutt' class='interactive b'> Brugere </button>";
		
		if(isset($adduser)) {}
		echo "<select size='1' id='adminuser' name='adminuser' class='interactive hideform'>";
			echo "<option value='0'> Tilføj Eller Slet Bruger</option>";
			echo "<option value='adduser'>Tilføj Bruger</option>";
			echo "<option value='deluser'>Slet Bruger</option>";
		echo "</select>";
		
		
		echo "<div id='userform' class='hideform'>";
		echo "<form id='addform' method='post' action='adduser.php'>";
		
		echo "<p class='infotekst'> Fornavn: </p>";
		echo "<input type='text' id='addfirstname' class='fatadd fiddy' name='addfirstname'>";
		
		echo "<p class='infotekst'> Efternavn: </p>";
		echo "<input type='text' id='addlastname' class='fatadd fiddy' name='addlastname'>";
		
		echo "<p class='infotekst'> Email: </p>";
		echo "<input type='email' id='addemail' class='fatadd fiddy' name='addemail'>";
		
		echo "<input type='submit' id='userok' class='interactive b okdu' value='OK'>";
		
		echo "</form>";
		echo "</div>";
		
		
		
		echo "<div id='delform' class='hideform'>";
		echo "<form method='post' action='delete.php' id='deleform'>";
		
		echo "<p class='infotekst'> Brugers Email: </p>";
		echo "<input type='email' id='delemail' class='fatadd fiddy' name='delemail'>";
		
		echo "<input type='submit' id='userdel' class='interactive b okdu' value='Slet'>";
		echo "</form>";
		echo "</div>";
		
}
?>

<script>
		$('select[name=adminuser]').change(function () {
			 if ($(this).val() == 'adduser') {
				$('#userform').show('fast');
			} else {
				$('#userform').hide();
			}
			
			if ($(this).val() == 'deluser') {
				$('#delform').show('fast');
			} else {
				$('#delform').hide();
			}
		});
			
</script>

<?php
mysqli_close($connection);
?>