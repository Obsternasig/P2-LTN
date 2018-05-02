<?php
	require_once "connection.php";
	header('Content-type: text/html; charset=utf-8');
	session_start();

	$users = mysqli_query($connection, "SELECT * FROM users");


		if(!$users) {
			die("Could not query the database" .mysqli_error());
		}


	$userassoc = mysqli_fetch_assoc($users);

	
	if(isset($_SESSION['loginid'])){
		
		$ID = $_SESSION['loginid'];

		$idquery = "SELECT * FROM users WHERE ID =$ID";
		$idresults = mysqli_query($connection, $idquery);

			if(!$idresults){
				
				 die("Could not query the database" .mysqli_error());
			} else {
				
				$idrow = mysqli_fetch_assoc($idresults);
	
					$firstname = $idrow['firstname'];
					$lastname = $idrow['lastname'];
					$admin = $idrow['adminon'];
			}
			
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
		
			<a href="adaptivegrid.php"><img id="imglogo" src="images/logo.png"/></a>
		
		</div>
		
  		<div class="search">
		
			<input type="text" id="searchfield" name="search" class="interactive" placeholder="Søg..." autocomplete="off">
			
			
			<select size="1" id="cateopt" name="cateopt" class="interactive">
				<option value="alle">Alle</option>

					<?php
							$kompsort = mysqli_query($connection, "SELECT DISTINCT category FROM komponenter ORDER BY category ASC");

							while ($kompkat = mysqli_fetch_assoc($kompsort)) {

								$category = $kompkat['category'];
								echo "<option value=" . $category . ">" . ucfirst($category) . "</option>";

							}

					?>

			</select>
		</div>
		
  		<div class="person"> 
			
			<div class="personid"> 
				<?php 
					
					if (isset($firstname)&&isset($lastname)) { 
						
						echo "<img src='images/mand.png'>" . " ";
						echo $firstname . " " . $lastname; 
					} 
				?> 
				
				<a href="help.html" target="_blank"> <button class="interactive b" id="help"> ? </button></a>
			</div>
			
		</div>
		
		<div class="functions"> 
	
			<button id="addbutt" class="interactive b"> Tilføj </button>
			
			<button id="editbutt" class="interactive b"> Rediger </button>
			
			<?php 
			
			if (isset($admin)) {
				
				if ($admin == 1) {
			
					echo "<button id='adminbutt' class='interactive b'> Admin </button>";
				}
			}
			?>
		
		</div>

		<div class="end">
			<button class="interactive b" onclick="window.location.replace ('logout.php');">Afslut</button>
		</div>
		
		<div class="list"></div>

		<div class="information">
			
			<div id="infodiv" class="infotekst">
				<h2 class='infodo'>Velkommen!</h2>

				<h3>Hvordan finder jeg en bestemt komponent?</h3>
				
				<p>En komponent findes ved at klikke ind på den kategori komponenten er i, derved kommer der en liste hvor du kan se alle de individuelle komponenter i den valgte kategori.
				Du kan også søge på komponentens specifikationer, som for eksempel mærke eller serienummer, i toppen af siden. Eller vælge en kategori i drop down menuen lige under søgebjælken.</p>

				<h3>Hvordan låner jeg en komponent?</h3>
				
				<p>For at låne en komponent, tryk på komponenten du ønsker at låne, derefter tryk på knappen ”Lån” i venstre side. Derefter ændrer du statussen på komponent til udlånt.</p>

				<h3>Hvordan redigerer jeg en komponent?</h3>
				
				<p>Hvis du vil redigere en komponent, skal du blot trykke på komponenten i listen, derefter trykke på knappen ”Rediger” i venstre side. Når redigeringen er fuldført, skal du bare trykke på færdig eller annuller.</p>

			</div>
			
		</div>
		
	</div>


	<script>

		$(document).ready(function(){
			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////    START    //////////////////////////////// */
			
			
			$.ajax ({
					url: 'getlist.php',
					success: function(response) {
						$('.list').html(response);
					}
			});


			function cleanallinfo() {
				
				$(".information").empty();
				$("#addwhat").val('0');
				$('li').removeClass('selected');
				$('.divID').slideUp("fast", function() { $(this).empty(); } );
				$('.grid *').removeClass('btoggle');
				
			}
			
			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////    SEARCH   //////////////////////////////// */
			
			
			$("#cateopt").on('change', function() {

				var option = this.value;
				$("#searchfield").val('');
				
				$.ajax ({
					url: 'getlist.php',
					type: 'POST',
					data: { option : option },
					success: function(response) {
						$('.list').html(response);
					}
					// value will be accessible in $_POST['option'] inside getlist.php
				});
			});


			$("#searchfield").keyup(function () {

				var search = $("#searchfield").val();
				$("#cateopt").val('alle');

				$.ajax({
					url: 'getlist.php',
					cache: false,
					type: 'POST',
					data: { search : search },
					success: function(response) {
						$(".list").html(response);
					}
				});
			});
			
			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////     LIST    //////////////////////////////// */
			
			
			$(".grid").on('click', '.komps', function() {
					
					$('.grid *').removeClass('btoggle');
					
					var Id = $(this).attr('id');
				
					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');
						$('.information').empty();

					} else {
						
						$('.komps').removeClass('selected');
						$(this).addClass('selected');
						
						$.ajax ({
							url: 'getinfo.php',
							type: 'POST',
							data : { id1 : Id },
							success: function(response) {
								$('.information').html(response);
							}
						});
					}
			});
			
			
			$(".grid").on('click', 'li', function() {
				
					$("#addwhat").val('0');
					
					var Id = $(this).attr('id');

					if($(this).hasClass('liselected')) {

						$(this).removeClass('liselected');
						$('#div' + Id).slideUp("fast", function() { $(this).empty(); } );
						
						/* if($(this).siblings.hasClass('selected')) {
							cleanallinfo();
						} 
						
						Sæt komps ind i en div under li elementet således det bliver et child, og check så om li'ens children har classen selected, og hvis ja så clean informations div'en
						*/

					} else {
						
						$(this).addClass('liselected');

						$.ajax ({
							url: 'getkomps.php',
							type: 'POST',
							data : { id1 : Id },
							success: function(response) {
								$('#div' + Id).html(response).slideDown("fast");
							}
						});
					}
			});

			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////   BUTTONS   //////////////////////////////// */
			
			
			//$("#help").on("click", function(){
				
  				//$(".popupoverlay").addClass("active");
				
			//});

			
			//$(".popupoverlay").on("click", function(){
				
  				//$(".popupoverlay").removeClass("active");
			//});
			
			
			$(".grid").on('click', '#addcancel', function() {
				$(".information *").slideUp("fast", function(){
					$(".information").empty();
					$("#addwhat").val('0');
					$('.grid *').removeClass('btoggle');
				});
			});
			
			$(".grid").on('click', '#editcancel', function() {
				$('.grid *').removeClass('btoggle fatedit');
				$('.information button').hide();
				$('.infotekst').attr("contenteditable", "false");
				
				//For at resette tekstfelterne til deres forrige værdi, så skal den bare genindlæses uden at der sker en permanent ændring i db
			});
			
			
			$(".grid").on('click', '#addbutt', function() {
				
				cleanallinfo();
				$(this).addClass('btoggle');
				
				var initial = "set";
				
				$.ajax ({
					url: 'getform.php',
					type: 'POST',
					data: { initial : initial },
					success: function(response) {
						$('.information').html(response);
					}
				});
			});
			
			
			$(".grid").on('click', '#adminbutt', function() {
				
				cleanallinfo();
				$(this).addClass('btoggle');
				
				var admin = "set";
				
				$.ajax ({
					url: 'getform.php',
					type: 'POST',
					data: { admin : admin },
					success: function(response) {
						$('.information').html(response);
					}
				});
			});
			
			
			$(".grid").on('click', '#editbutt', function() {
				
				if($('.komps').hasClass('selected')){
					
				$(this).addClass('btoggle');
				$('.infotekst').attr("contenteditable", "true");
				$('div.infotekst').addClass('fatedit');
				
				var edit = "set";
				
				$.ajax ({
					url: 'getinfo.php',
					type: 'POST',
					data: { edit : edit },
					success: function(response) {
						$('.information button').hide();
						$('.information').append(response);
						$('.infotekst').attr("contenteditable", "true");
					}
				});
				
				}
				
			});
			

			/* ///////////////////////////////////////////////////////////////////////////// */
			/* //////////////////////////////// INFORMATION //////////////////////////////// */
			
			
			$(".grid").on('change', '#addwhat', function() {
				
				var value = this.value;
	
				$.ajax ({
					url: 'getform.php',
					type: 'POST',
					data: { value : value },
					success: function(response) {
						if($('.naddkomp').length == 0){
							$('.information').append(response);
						} else {
							$('.naddkomp').hide().html(response).slideDown("slow");
						}
					}
				});
        	});
			
	
			/* ///////////////////////////////////////////////////////////////////////////// */
		});
		
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>