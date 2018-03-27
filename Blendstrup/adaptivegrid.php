<?php
	require_once "../Blendstrup/connection.php";

	$results = mysqli_query($connection, "SELECT * FROM switches");

	if(!$results) {
		die("Could not query the database" .mysqli_error());
	}
?>

<!doctype html>
<html>
	
<head>
	<meta charset="utf-8">
	<title>Adaptive Grid</title>
	<link rel="stylesheet" href="../Blendstrup/adaptivegrid.css">
</head>

<body>
	
	<div class="grid">
		
  		<div class="logo"> Logo </div>
  		<div class="search"> Search </div>
  		<div class="end"> End </div>
  		<div class="functions"> Functions </div>
  		<div class="shoppinglist"> Shopping-list </div>
		
 		<div class="list"> 
			
			List
			
			<ul type="none">
				
				<?php 
				
					while ($row = mysqli_fetch_assoc($results)) {
						
						$id = $row['ID'];
						echo "<li><a href='contact.php?name=$id'>" . $row['Name'] . " " 
							. $row['Surname'] . "</a></li>";
					}
				
				?>
				
			</ul>	
		</div>
		
		<div class="information"> Information </div>
		
	</div>
</body>
	
</html>