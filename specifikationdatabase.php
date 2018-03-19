<?php
	require_once 'specifikationdatabase.php';
	
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
mysqli_close($connection);		
?>