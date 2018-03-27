<!doctype html>	

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../tilfoej.css">
<title>Tilføj komponent</title>
</head>
	
<body>	
	<form name="form" id="form" method="post" autocomplete="on" action="specifikationdatabase.php">
		<div>
			<p>Navn:</p>
			<input type="text" name="navn" id="navn" required size="30" maxlength="30">
		</div>

		<div>
			<p>Lokation:</p>
			<input type="text" name="lokation" id="lokation" required size="30" maxlength="30">
		</div>

		<div>
			<p>Antal:</p>
			<input type="number" name="antal" id="antal" required size="10" maxlength="10">
		</div>

		<div>
			<p>Beskrivelse:</p>
			<input type="text" name="beskrivelse" id="beskrivelse" required size="50" maxlength="50">
		</div>

		<div>
			<input type="submit" id="ok" value="OK">
			<input type="reset" id="reset" value="Reset">
		</div>
	</form>
						
</body>
</html>