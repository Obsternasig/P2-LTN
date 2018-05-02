<?php


///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////// FRA JONAS' KONTAKTBOG, IKKE TILPASSET ////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////


	require_once 'connection.php';

	if(isset($_POST['editfirstname'])&&isset($_POST['editlastname'])&&isset($_POST['ID'])){
				
				$name = htmlentities($_POST['editfirstname']);
				$lastname = htmlentities($_POST['editlastname']);
				$ID = htmlentities($_POST['ID']);
				
				if(isset($_POST['editdescription'])){
					$description = $_POST['editdescription'];
				} else {
					$description="";
				}
				
				if(isset($_POST['editemail'])){
					$email = $_POST['editemail'];
				} else {
					$email="";
				}
				
				if(isset($_POST['editphone'])){
					$phone = $_POST['editphone'];
				} else {
					$phone="";
				}
				
				
				if(!empty($name)&&!empty($lastname)&&!empty($ID)){
					
					$query = "UPDATE contacts SET Name='$name', Surname='$lastname', 
					Description='$description', Email='$email', Phone='$phone' WHERE ID = '$ID';";
					
   					echo $query;
					
					$results = mysqli_query($connection,$query);

					 if(!$results){
							die("Could not query the database" .mysqli_error());
					 }

				
				header('Location: viewcontacts.php');

			
				}
			}else{
				echo "Ups, something went wrong";
			}

mysqli_close($connection);
?>