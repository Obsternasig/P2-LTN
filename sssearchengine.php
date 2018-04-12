<?php 
	require_once "ssconnection.php";
	header('Content-type: text/html; charset=utf-8');

	if (isset($_POST['submit-search'])) {
		$search = mysqli_real_escape_string($connection, $_POST['search']);
		/*forhindre MYSQl injection, så brugeren ikke skriver noget mærkeligt og ikke fucker med vores DB*/
		$sql = "SELECT * FROM komponenter WHERE category LIKE '%$search%' OR brand LIKE '%$search%'";
		/*Tager data fra tables*/
		
		$result = mysqli_query($connection, $sql);
		$queryResult = mysqli_num_rows($result);
		
		echo "Der er ".$queryResult." resultater ved det søgte!";
		
		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)){
				echo "<div>
					<h3>" .$row['category']."</h3> 
					<p>" .$row['brand']. "</p>
					</div>";
			}
		} else {
			echo "There are no results matching your search";
		}
		
	}
	mysqli_close($connection);
?>