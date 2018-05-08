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

				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$email = $row['email'];

				echo "<li>";
				
					echo "<div id='adminnavn' class='adminbrug'>" . $firstname . " " . $lastname . "</div>" . "<div class='adminbrug'>" . "Email: " . $email . " </div>";
				
					echo "<button class='interactive b adminbutton' id='" . $row['ID'] . "'> Slet </button>";

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

				echo "<div class='adminhisto'>$time | $name har $action $serialnb</div>";

			
			echo "<br>";


				echo "</li>";

				echo "<hr>";

			}

		echo "</ul>";
		
	}


mysqli_close($connection);
?>