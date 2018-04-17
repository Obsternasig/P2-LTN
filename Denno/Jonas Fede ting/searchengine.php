<?php 
	require_once "connection.php";
	header('Content-type: text/html; charset=utf-8');

	

	if (isset($_POST['searchfield'])) {
		$search = mysqli_real_escape_string($connection, $_POST['searchfield']);
		/*forhindre MYSQl injection, så brugeren ikke skriver noget mærkeligt og ikke fucker med vores DB*/
		$sql = "SELECT * FROM komponenter WHERE category LIKE '%$search%' OR brand LIKE '%$search%'";
		/*Tager data fra tables*/
		
		$result = mysqli_query($connection, $sql);
		$queryResult = mysqli_num_rows($result);
		
		echo "Der er ".$queryResult." resultater ved det søgte!";
		
		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)){
				echo "<ul>";
							
							$away = $row['away'];
							$broken = $row['broken'];
							
							echo "<li>";

								echo "<input type='checkbox'>";

								echo "<div id='kate'>" . $row['category'] . "</div>";

								echo "<div>" . " Mærke: " . $row['brand'] . "</div>";
								echo "<div>" . " Porte: " . $row['ports']  . "</div>";
								echo "<div>" . " Antal: " . $row['amount'] . "</div>";

							echo "<br>";

								echo "<div class='status' id='firststatus' style='color: " . getColorAway($away) . "'>" . "<input type='checkbox'>" . " Udlånte: " . $row['away'] . "</div>";
							
								echo "<div class='status' style='color: " . getColorBroken($broken) . "'>" . "<input type='checkbox'>"  . " Ødelagte: " . $row['broken'] . "</div>";

							
							echo "</li>";
							echo "<hr>";
							
						}
					
					echo "</ul>";
				echo "<div>
					<h3>" .$row['category']."</h3> 
					<p>" .$row['brand']. "</p>
					</div>";
			}
		} else {
			echo "There are no results matching your search";
		}
		

	mysqli_close($connection);
?>