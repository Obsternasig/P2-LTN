<?php

	require_once "connection.php";
	
	if(isset($_POST['iniuser'])){
		$iniuser = $_POST['iniuser'];
	}

	if(isset($iniuser)) {
			echo "<select size='1' id='adminadel' class='interactive'>";
				echo "<option value='0'> Tilføj Eller Slet Bruger</option>";
				echo "<option value='adduser'>Tilføj Bruger</option>";
				echo "<option value='deluser'>Slet Bruger</option>";
			echo "</select>";
		}
	
	if(isset($deluser)) {
		echo "<p class='infotekst'> Fornavn: </p>";
		echo "<input type='text' id='addfirstname' class='fatadd fiddy' name='addfirstname'>";
		
		echo "<p class='infotekst'> Efternavn: </p>";
		echo "<input type='text' id='addlastname' class='fatadd fiddy' name='addlastname'>";
		
		echo "<p class='infotekst'> Email: </p>";
		echo "<input type='email' id='addemail' class='fatadd fiddy' name='addemail'>";
		
		echo "<input type='submit' id='userok' class='interactive b okdu' value='OK'>";
		
		echo "</form>";
		echo "</div>";
	}
		
	
	if(isset($adduser)){
		echo "<div id='delform''>";
		echo "<p class='infotekst'> Slet en bruger ved, at indtaste brugerens email. </p>";
		
		echo "<p class='infotekst'> Brugers Email: </p>";
		echo "<input type='email' id='delemail' class='fatadd fiddy' name='delemail'>";
		
		echo "<input type='submit' id='userdel' class='interactive b okdu' value='Slet'>";
		echo "</div>";
	}

mysqli_close($connection);

?>