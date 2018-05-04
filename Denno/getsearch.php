<?php

require_once "connection.php";

	echo "<input type='text' id='searchfield' name='search' class='interactive' placeholder='Søg...' autocomplete='off'>";
			
			
	echo "<select size='1' id='cateopt' name='cateopt' class='interactive'>";
		echo "<option value='alle'>Alle</option>";

					$kompsort = mysqli_query($connection, "SELECT DISTINCT category FROM komponenter ORDER BY category ASC");

					while ($kompkat = mysqli_fetch_assoc($kompsort)) {

						$category = $kompkat['category'];
						echo "<option value=" . $category . ">" . ucfirst($category) . "</option>";

					}

	echo "</select>";

?>