<?php
require_once "connection.php";


	if(isset($_POST['users'])){
		$users = $_POST['users'];
	}

	if(isset($_POST['history'])){
		$history = $_POST['history'];
	}


	if(isset($users)) {

		$adminquery = mysqli_query($connection, "SELECT * FROM users");

		echo "<ul>";

			while ($row = mysqli_fetch_assoc($adminquery)) {

				$category = $row['category'];
				$brand = $row['brand'];

				echo "<li id=" . $row['ID'] . ">";


				echo "</li>";

				echo "<hr>";

			}

		echo "</ul>";
		
	} 



	if(isset($history)) {

		$adminquery = mysqli_query($connection, "SELECT * FROM history");


		echo "<ul>";

			while ($row = mysqli_fetch_assoc($adminquery)) {

				$category = $row['category'];
				$brand = $row['brand'];

				echo "<li id=" . $row['ID'] . ">";


				echo "</li>";

				echo "<hr>";

			}

		echo "</ul>";
		
	}


mysqli_close($connection);
?>