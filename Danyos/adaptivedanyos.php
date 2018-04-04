<?php
	require_once "../Blendstrup/connection.php";

	$komp = mysqli_query($connection, "SELECT * FROM komponenter");

	if(!$komp) {
		die("Could not query the database" .mysqli_error());
	}


	function getColorAway($var) {
    		if ($var <= 0)
        		return '#ffffff';
		
    		else if ($var >= 1)
				return '#334488';
		}
			
	function getColorBroken($var) {
    		if ($var <= 0)
  				return '#ffffff';
		
   			else if ($var >= 1)
				return '#e95522';
		}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title> Adaptive Grid </title>
	<link rel="stylesheet" href="adaptivedanyos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	
	<div class="grid">
		
  		<div class="logo">
		
			<img id="imglogo" src="Images/logo.png" />
			
		</div>
		
  		<div class="search">
		
			<input type="search" id="searchfield" class="roundedborders dropshadow" placeholder="Søg...">														   		
				<select size="1" id="categories" class="roundedborders dropshadow">
					<option>Alle</option>
					<option value="1">Switches</option>
					<option value="2">Ramblokke</option>
					<option value="3">Kategori 3</option>
				</select>

		</div>
  		<div class="end">  
			<button class="roundedborders dropshadow" type="endbutton" id=button>Afslut</button> 
		</div>
		<div class="functions">  </div>
  		<div class="shoppinglist">  </div>

		<div class="list">

				<?php 
	
					echo "<ul>";
				
						while ($row = mysqli_fetch_assoc($komp)) {
							
							$away = $row['away'];
							$broken = $row['broken'];
							
							echo "<li>";

								echo "<input type='checkbox'>";

								echo "<div id='kate'>" . $row['kategori'] . "</div>";

								echo "<div>" . " Mærke: " . $row['brand'] . "</div>";
								echo "<div>" . " Porte: " . $row['porte']  . "</div>";
								echo "<div>" . " Antal: " . $row['antal'] . "</div>";

							echo "<br>";

								echo "<div class='status' id='firststatus' style='color: " . getColorAway($away) . "'>" . "<input type='checkbox'>" . " Udlånte: " . $row['away'] . "</div>";
							
								echo "<div class='status' style='color: " . getColorBroken($broken) . "'>" . "<input type='checkbox'>"  . " Ødelagte: " . $row['broken'] . "</div>";

							
							echo "</li>";
							echo "<hr>";
							
						}
					
					echo "</ul>";
			?>
		</div>
		
		<div class="information"> 
			
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
		
	</div>

	
	<script>
		$("document").ready(function(){
			
			var $li = $('li').click(function() {
				
					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');

					} else {

					$li.removeClass('selected');
					$(this).addClass('selected');
				}
			});
			
		});
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>