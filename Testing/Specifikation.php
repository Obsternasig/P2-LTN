<!doctype html>	
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../Tilføjknap.css">
<title>Tilføj komponent</title>
</head>
	
<body>	
	
<?php
	//create database connection
	$connection = mysqli_connect('localhost','root','','tilføj');
	
	if(isset($_POST['Navn'])&&isset($_POST['Lokation'])&&isset($_POST['Antal'])&&isset($_POST['Beskrivelse'])){

			$Navn = htmlentities($_POST['Navn']);
			$Lokation = htmlentities($_POST['Lokation']);
			$Antal = htmlentities($_POST['Antal']);
			$Beskrivelse = htmlentities($_POST['Beskrivelse']);
		
	if(!empty($Navn)&&!empty($Lokation)&&!empty($Antal)&&!empty($Beskrivelse)){

	$query = "INSERT INTO /VALUES/ ('', '', '', '', '') VALUES ('$Navn', '$Lokation', '$Antal', '$Beskrivelse')";
	$results = mysqli_query($connection, $query);

		
	if(!$results){
		die("cannot connect to database".mysqli_connect_error());
	}
?>
	
<html>

	<form name="tilføj" id="til'føj" method="post" autocomplete="on">
		<div class="specifikation">
			<p>Navn:</p>
			<input type="text" name="navn" id="navn" required size="30" maxlength="30">
		</div>

		<div class="specifikation">
			<p>Lokation:</p>
			<input type="text" name="lokation" id="lokation" required size="30" maxlength="30">
		</div>

		<div class="specifikation">
			<p>Antal:</p>
			<input type="number" name="antal" id="antal" required size="10" maxlength="10">
		</div>

		<div class="specifikation">
			<p>Beskrivelse:</p>
			<input type="text" name="beskrivelse" id="beskrivelse" required size="50" maxlength="50">
		</div>

		<div class="specifikation">
			<input type="submit" id="ok" value="OK">
			<input type="reset" id="reset" value="Reset">
		</div>
	</form>
</html>
				
<?php
	mysqli_close($connection);
?>		
</body>
</html>