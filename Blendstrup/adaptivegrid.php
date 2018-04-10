<?php
	require_once "connection.php";
	header('Content-type: text/html; charset=utf-8');

	$komp = mysqli_query($connection, "SELECT * FROM komponenter");
	$users = mysqli_query($connection, "SELECT * FROM users");


		if(!$komp) {
			die("Could not query the database" .mysqli_error());
		}

		if(!$users) {
			die("Could not query the database" .mysqli_error());
		}


	$userassoc = mysqli_fetch_assoc($users);


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
	<link rel="stylesheet" href="adaptivegrid.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	
	<div class="grid">
		
  		<div class="logo">
		
			<img id="imglogo" src="images/logo.png" />
		
		</div>
		
  		<div class="search">
		
			<input type="search" id="searchfield" class="interactive" placeholder="Søg...">
		
			<select size="1" id="searchcategories" class="interactive">
				<option>Alle</option>
				<option value="1">Switches</option>
				<option value="2">Ramblokke</option>
				<option value="3">Kategori 3</option>
			</select>

		</div>
		
  		<div class="end"> 
			
			<button id="endbutton" class="interactive b" onclick="window.location.href='login.php'">Afslut</button>
			<div class="person"> <img src="images/mand.png"> <?php echo $userassoc['user_first'] . " " . $userassoc['user_last']; ?> </div>
			
		</div>
		
		<div class="functions"> 
	
			<button id="addbutt" class="interactive b"> Tilføj </button>
			
			<button id="editbutt" class="interactive b"> Rediger </button>
			
			<button id="groupbutt" class="interactive b"> Gruppér </button>
		
		</div>
		
  		<div class="shoppinglist">  </div>

		<div class="list">

				<?php 
	
					echo "<ul>";
				
						while ($row = mysqli_fetch_assoc($komp)) {
							
							$away = $row['away'];
							$broken = $row['broken'];
							
							echo "<li>";

								echo "<input type='checkbox'>";

								echo "<div id='kate'>" . $row['category'] . "</div>";

								echo "<div>" . " Mærke: " . $row['brand'] . "</div>";
								echo "<div>" . " Porte: " . $row['ports']  . "</div>";
								echo "<div>" . " Antal: " . $row['amount'] . "</div>";

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
			
			<select size="1" id="addwhat" class="interactive">
				<option value="0"> Vælg hvad der skal tilføjes </option>
				<option value="adduser">Tilføj bruger</option>
				<option value="addkomp">Tilføj komponent</option>
			</select>
			
			<button id="addcancel" class="interactive b"> Annuller </button>
			
			<div id="addkomp" class="addhidingclass">
				
				<form name="addkomp" id="addkomp" method="post" action="addkomp.php">
					<div>
						<p>Kategori:</p>
						<input type="text" name="category" id="category" maxlength="30">
					</div>

					<div>
						<p>Brand:</p>
						<input type="text" name="brand" id="brand" maxlength="30">
					</div>

					<div>
						<p>Porte:</p>
						<input type="number" name="ports" id="ports" maxlength="4">
					</div>

					<div>
						<p>Antal:</p>
						<input type="number" name="amount" id="amount" maxlength="4">
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
			
			<div id="adduser" class="addhidingclass">
				
				<form name="adduser" id="adduser" method="post" action="adduser.php">
					<div>
						<p>First name:</p>
						<input type="text" name="addfirstname" id="addfirstname" maxlength="20">
					</div>

					<div>
						<p>Last name:</p>
						<input type="text" name="addlastname" id="addlastname" maxlength="20">
					</div>

					<div>
						<p>E-mail:</p>
						<input type="email" name="addemail" id="addemail" maxlength="50">
					</div>

					<div>
						<input type="submit" id="ok" value="OK">
					</div>
				</form>
				
			</div>
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
			
			
			
			$("#addbutt").click(function() {
				
				$("#addwhat, #addcancel").slideDown("fast");
				
			});
			
			$('#addwhat').change(function(){
				
            	$('.addhidingclass').slideUp();
            	$('#' + $(this).val()).slideDown();
        	});
			
			$('#addcancel').click(function() {
				$("#addwhat, #addcancel, .addhidingclass").slideUp("fast");
			})
			
			$('#addcancel').click(function() {
				$("#addwhat").val('0');
			})

		});
		
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>