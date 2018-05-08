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

		$adminquery = mysqli_query($connection, "SELECT * FROM history ORDER BY time DESC");


		echo "<ul>";

			while ($row = mysqli_fetch_assoc($adminquery)) {

				$time = $row['time'];
				$name = $row['name'];
				$event = $row['event'];
				$serialnb = $row['serialnb'];
				
				if($event == 'add'){
					$action = "tilføjet";
				} elseif($event == 'edit'){
					$action = "redigeret i";
				}
				
				echo "<li>";

				echo "<div>$time | $name har $action $serialnb</div>";

			
			echo "<br>";


				echo "</li>";

				echo "<hr>";

			}

		echo "</ul>";
		
	}


mysqli_close($connection);
?>