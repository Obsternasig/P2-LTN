<?php
	require_once "../Blendstrup/connection.php";

	$switches = mysqli_query($connection, "SELECT * FROM switches");

	if(!$switches) {
		die("Could not query the database" .mysqli_error());
	}
?>

<!doctype html>
<html>
	
<head>
	<meta charset="utf-8">
	<title> Adaptive Grid </title>
	<link rel="stylesheet" href="../Blendstrup/adaptivegrid.css">
</head>

<body>
	
	<div class="grid">
		
  		<div class="logo"> Logo </div>
  		<div class="search"> Search </div>
  		<div class="end"> End </div>
		<div class="functions">

			<form name="addkomp" id="addkomp" method="post" action="addkomp.php">
				<div>
					<p>Kategori:</p>
					<input type="text" name="kategori" id="kategori" maxlength="30">
				</div>

				<div>
					<p>Brand:</p>
					<input type="text" name="brand" id="brand" maxlength="30">
				</div>

				<div>
					<p>Porte:</p>
					<input type="number" name="porte" id="porte" maxlength="4">
				</div>

				<div>
					<p>Antal:</p>
					<input type="number" name="antal" id="antal" maxlength="4">
				</div>

				<div>
					<p>Udlånt:</p>
					<input type="number" name="away" id="away" maxlength="4">
				</div>

				<div>
					<p>Ødelagte:</p>
					<input type="number" name="broken" id="broken" maxlength="4">
				</div>

				<div>
					<input type="submit" id="ok" value="OK">
				</div>

			</form> 
		</div>
  		<div class="shoppinglist"> Shopping-list </div>

		<div class="list"> 

				<?php 
					echo "<ul type='none'>";
				
					while ($row = mysqli_fetch_assoc($switches)) {

						echo "<li>" . "<input type='checkbox'>" . "<div id='kate'>" . $row['kategori'] . "</div>" . $row['brand'] . "</li>";
						echo "<hr>";
					}
					
					echo "</ul>"

				?>
	
		</div>
		
		<div class="information"> Information </div>
		
	</div>
</body>
	
</html>