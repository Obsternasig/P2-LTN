<?php
require_once "connection.php";

	if(isset($_POST['id1'])) {
		$id = $_POST['id1'];
	}
		
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
/*
			
				
			echo "<form name='addkomp' id='addkomp' method='post' action='addkomp.php'>";
				echo "<div class='naddkomp'>";

					echo "<p>Kategori:</p>";
					echo "<input type='text' name='category' id='category' maxlength='30'>";

					echo "<p>Brand:</p>";
					echo "<input type='text' name='brand' id='brand' maxlength='30'>";

					echo "<p>Serienummer:</p>";
					echo "<input type='text' name='serialnb' id='serialnb' maxlength='30'>";

					echo "<p>Lokation:</p>";
					echo "<input type='text' name='location' id='location' maxlength='30'>";

					echo "<p>Kommentar:</p>";
					<input type="text" name="comment" id="comment" maxlength="4">

				</div>
					
					
				<div class="naddporte">
					<p>Porte:</p>
					<input type="text" name="ports" id="ports" maxlength="30">
				</div>

				<div class="naddspeed">
					<p>Hastighed:</p>
					<input type="text" name="speed" id="speed" maxlength="30">
				</div>

				<div class="naddtype">
					<p>Type:</p>
					<input type="text" name="type" id="type" maxlength="30">
				</div>

				<div class="naddsocket">
					<p>Socket:</p>
					<input type="text" name="socket" id="socket" maxlength="4">
				</div>

				<div class="naddkomp">
					<input type="submit" id="ok" value="OK">
				</div>
			</form>*/

mysqli_close($connection);
?>