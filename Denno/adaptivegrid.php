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
	<title> Super Storage </title>
	<link rel="stylesheet" href="adaptivegrid.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	
	<div class="grid">

  		<div class="logo">
		
			<a href="adaptivegrid.php"><img id="imglogo" src="images/logo.png"/></a>
		
		</div>
		
  		<div class="search"></div>
		
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
			<button class="interactive b" onclick="window.location.replace ('logout.php');">Log ud</button>
		</div>
		
		<div class="list"></div>

		<div class="information">
			
			<div id="infodiv" class="infotekst">
				<h2 class='infodo'>Velkommen!</h2>

				<p>Lan Team Nord er en frivillig computerforening som råder over en stor mængde af forskellige IT-komponenter, der blandt andet udlånes til store LAN-events. Systemet du befinder dig på, er et lagersystem over de forskellige komponenter foreningen stiller til rådighed for dets medlemmer og andre. </p>
				
				<p>Foreningen har adresse på C. H. Ryders Vej 24, 9210 Aalborg, og har åbent hver torsdag mellem 19-22. </p>

				<p>Mere information omkring foreningen kan findes på hjemmesiden: <a href="https://www.lanteamnord.dk/"> https://www.lanteamnord.dk/ </a> </p>
				
				<p>For yderligere hjælp i forhold til brug af systemet kan der trykkes på ”?” ikonet i højre hjørne af systemet.</p>
			</div>
			
		</div>
		
	</div>


	<script>

		$(document).ready(function(){
			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////    START    //////////////////////////////// */
			
			
			function reloadlist() {
				$.ajax ({
						url: 'getlist.php',
						success: function(response) {
							$('.list').html(response);
						}
				});
			}
			

			function reloadkomp(id) {
				$.ajax ({
					url: 'getinfo.php',
					type: 'POST',
					data : { id1 : id },
					success: function(response) {
						$('.information').html(response);
					}
				});
			}
			
			
			function reloadsearch() {
				$.ajax ({
						url: 'getsearch.php',
						success: function(response) {
							$('.search').html(response);
						}
				});
			}
			
			
			function cleanallinfo() {
				
				$(".information").empty();
				$("#addwhat").val('0');
				$('li').removeClass('liselected');
				$('.divID').slideUp("fast", function() { $(this).empty(); } );
				$('.grid *').removeClass('btoggle');
				
			}
			
			
			reloadlist();
			reloadsearch();
			
			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////    SEARCH   //////////////////////////////// */
			
			
			$(".search").on('change', '#cateopt', function() {

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


			var search = null;
			$(".search").on('keyup', '#searchfield', function (e) {
				
				search = $("#searchfield").val();
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
			
			
			$(".list").on('click', '.komps', function() {
					
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
			
			
			$(".list").on('click', 'li', function() {
				
					$("#addwhat").val('0');
					
					var Id = $(this).attr('id');
				
					if(search != null){
						var searched = search;
					} else {
						var searched = "";
					}
				
					//alert(searched);
				
					if($(this).hasClass('liselected')) {

						$(this).removeClass('liselected');
						$('#div' + Id).slideUp("fast", function() { $(this).empty(); } );
						$('.grid *').removeClass('btoggle');
						
						if($(this).siblings(".divID").children(".komps").hasClass('selected')) {
							$(".information").empty();
						}

					} else {
						
						$(this).addClass('liselected');

						$.ajax ({
							url: 'getkomps.php',
							type: 'POST',
							data : { id1 : Id, searched : searched },
							success: function(response) {
								$('#div' + Id).html(response).slideDown("fast");
							}
						});
					}
			});

			
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* ////////////////////////////////   BUTTONS   //////////////////////////////// */
			
			
			$(".grid").on('click', '#addbutt', function() {
				
				if(!$(this).hasClass('btoggle')) {
				
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
				
				} else {
					
					cleanallinfo();
					
				}
			});
			
			
			$(".grid").on('click', '#addok', function() {
				
				var cate = $('#addwhat').val();
				var brand = $('#addbrand').text();
				var serialnb = $('#addserialnb').text();
				var location = $('#addlocation').text();
				var comment = $('#addcomment').text();
				var speci = $('#addspeci').text();
				
					if($('#addporte').text() == undefined){
						var porte = "";
					} else {
						var porte = $('#addporte').text();
					}

					if($('#addspeed').text() == undefined){
						var speed = "";
					} else {
						var speed = $('#addspeed').text();
					}

					if($('#addsocket').text() == undefined){
						var socket = "";
					} else {
						var socket = $('#addsocket').text();
					}

					if($('#addtype').text() == undefined){
						var type = "";
					} else {
						var type = $('#addtype').text();
					}
				
				
				//alert(cate + brand + serialnb + location + comment + speci + porte + speed + socket + type);
				
				$.ajax ({
					url: 'addkomp.php',
					type: 'POST',
					data : { cate : cate, brand : brand, serialnb : serialnb, location : location, comment : comment, speci : speci, porte : porte, speed : speed, socket : socket, type : type },
					success: function() {
						
						$('.grid *').removeClass('btoggle');
						$(".information").empty();
						reloadlist();
						reloadsearch();
						
						alert("Komponent tilføjet!");
						
					}
				});
				
			});
			
			
			$(".grid").on('click', '#addcancel', function() {
				$(".information *").slideUp("fast", function(){
					$(".information").empty();
					$("#addwhat").val('0');
					$('.grid *').removeClass('btoggle');
				});
			});
			
			
			$(".grid").on('click', '#editbutt', function() {
				
				if(!$(this).hasClass('btoggle')) {
					if($('.komps').hasClass('selected')){

					$(this).addClass('btoggle');
					$('.infotekst').attr("contenteditable", "true");
					$('div.infotekst').addClass('fatedit');


					$('#editcancel').show();
					$('#editdone').show();


					var edit = "set";

					$.ajax ({
						url: 'getinfo.php',
						type: 'POST',
						data: { edit : edit },
						success: function(response) {
							$('.information').append(response);
							$('#instated').hide();
							$('#instatedsel').show();
							$('#incated, #incommed, #inspeced, #inplaced').attr("contenteditable", "true");
						}
					});

					} else {
						alert ('Ingen komponent valgt');
					}
				} else {
					
					var Id = $(this).parent().siblings('.list').find('.selected').attr('id');
				
					reloadkomp(Id);
					
					$('.grid *').removeClass('btoggle fatedit');
					$('.information button').hide();
					$('.infotekst').attr("contenteditable", "false");
				}
			});
			
			
			$(".grid").on('click', '#editdone', function() {
				
				var plasel = $('#inplaced').text();
				var stasel = $('#instatedsel').val();
				
				var comm = $('#incommed').text();
				var spec = $('#inspeced').text();
				
				var catspec = $('#incated').text();
				var catover = $('#catover').text();
				
				var Id = $(this).parent().siblings('.list').find('.selected').attr('id');
			
				
				$.ajax ({
					url: 'update.php',
					type: 'POST',
					data : { catover : catover, catspec : catspec, plasel : plasel, stasel : stasel, comm : comm, spec : spec, id : Id },
					success: function() {
						
						$('.grid *').removeClass('btoggle fatedit');
						$(".information").empty();
						reloadlist();
						reloadsearch();
						
						alert("Komponent opdateret!");
						
					}
				});
				
			});
			
			
			$(".grid").on('click', '#editcancel', function() {
				$('.grid *').removeClass('btoggle fatedit');
				$('.information button').hide();
				$('.infotekst').attr("contenteditable", "false");
				
				var Id = $(this).parent().siblings('.list').find('.selected').attr('id');
				
				reloadkomp(Id);
			});
			

			/* ///////////////////////////////////////////////////////////////////////////// */
			/* //////////////////////////////// INFORMATION //////////////////////////////// */
			
			
			$(".information").on('change', '#addwhat', function() {
				
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
			
			
			$('.information').on('keyup keydown paste', '.fiddy', function() {
				
				
				var add = $(this).text().length;
				var Id = $(this).attr('id');	
				
				if(Id == "addcomment" || Id == "addspeci") {
					
					var max = 500;
					
				} else {
					
					var max = 50;
				}
				
				
				if(add > max){
					
					var toomuch = add - max;
					
					$(this).prevAll("div.addam:first").text( "-" + toomuch );
					$(this).css({'border-color': 'red'});
					
				} else if((add <= max) && (add != 0)){

					$(this).css({'border-color': '#303030', 'color': '#D7D7D7'});
					$(this).prevAll("div.addam:first").text( add );
				
				} else if(add == 0) {
					
					$(this).prevAll("div.addam:first").html("");
					$(this).css({'border-color': '#303030'});
				}
			});
			
	
			/* ///////////////////////////////////////////////////////////////////////////// */
			/* /////////////////////////////////// ADMIN /////////////////////////////////// */
			
			
			$(".grid").on('click', '#adminbutt', function() {
				if(!$(this).hasClass('btoggle')) {
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
				} else {
					
					cleanallinfo();
					
				}
			});
			
			
			$(".grid").on('click', '#histobutt, #userbutt', function() {
				
				alert("Ikke implementeret endnu :(");
				
			});
			
			
		});
		
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>