<?php
require_once "connection.php";

		echo "<button id='addcancel' class='interactive b'> Annuller </button>";
		echo "<div class='editkomp'>";
            echo "<form name='editform' id='editform' method='post' action='editData.php' autocomplete='on'>";
			echo "<p>Kategori:</p>";
			echo "<input type='text' name='category' id='category' maxlength='50'>";

			echo "<p>Brand:</p>";
			echo "<input type='text' name='brand' id='brand' maxlength='50'>";

			echo "<p>Serienummer:</p>";
			echo "<input type='text' name='serialnb' id='serialnb' maxlength='50'>";

			echo "<p>Lokation:</p>";
			echo "<input type='text' name='location' id='location' maxlength='50'>";

			echo "<p>Kommentar:</p>";
			echo "<input type='text' name='comment' id='comment' maxlength='250'>";



		
			echo "<div class='neditkomp'>";
				echo "<input type='submit' id='ok' value='OK'>";
                echo "</form>";
                echo "</div>";
			
		echo "</div>";
	


mysqli_close($connection);
?>