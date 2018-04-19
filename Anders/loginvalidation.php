<?php

	require_once "connection.php";
	session_start();
   
	if(isset($_POST['ini1'])&&isset($_POST['ini2'])&&isset($_POST['pin1'])&&isset($_POST['pin2'])&&isset($_POST['pin3'])&&isset($_POST['pin4'])){     

		$ini1 = htmlentities($_POST['ini1']);
		$ini2 = htmlentities($_POST['ini2']);
		$pin1 = htmlentities($_POST['pin1']);
		$pin2 = htmlentities($_POST['pin2']);
		$pin3 = htmlentities($_POST['pin3']);
		$pin4 = htmlentities($_POST['pin4']);
		
		$initialer = $ini1 . $ini2;
		$pinkode = $pin1 . $pin2 . $pin3 . $pin4;

		
		if(!empty($initialer)&&!empty($pinkode)) {

		
			$query = "SELECT * FROM users WHERE initials = '" . $initialer . "' AND pin = '" . $pinkode . "'";
			$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				
				$resultid = mysqli_fetch_assoc($result);
				$id = $resultid['ID'];
				
				if(!empty($id)) {
					
					$_SESSION['loginid'] = $id;
					header("Location: superstorage.php");
				
				} else {
					
					header("Location: index.php");
				}
			}
		}
	}
		
	mysqli_close($connection);
?>