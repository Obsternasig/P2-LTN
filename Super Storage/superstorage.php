<?php
	require_once "connection.php";
	header('Content-type: text/html; charset=utf-8');
	session_start();

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
	<title> LTN  - Super Storage </title>
	<link rel="stylesheet" href="superstorage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	
	<div class="grid">
		
  		<div class="logo">
		
			<a href="superstorage.php"><img id="imglogo" src="images/logo.png"/></a>
		
		</div>
		
  		<div class="search">
		
			<form method="POST">
				<input type="search" id="search" name="search" class="interactive" placeholder="Søg...">
			</form>
			
			<form id="cateform" method="POST" action="">
				<select size="1" id="cateopt" name="cateopt" class="interactive">
					<option value="null">Alle</option>

						<?php
								$kompsort = mysqli_query($connection, "SELECT DISTINCT category FROM komponenter ORDER BY category ASC");
								
								while ($kompkat = mysqli_fetch_assoc($kompsort)) {

									$category = $kompkat['category'];
									echo "<option value=" . $category . ">" . ucfirst($category) . "</option>";

								}

						?>

				</select>
			</form>
		</div>
		
  		<div class="end"> 
			
			<button id="endbutton" class="interactive b" onclick="window.location.href='index.php'">AFSLUT</button>
			
			<div class="person"> 
				<?php 
					
					if (isset($firstname)&&isset($lastname)) { 
						
						echo "<img src='images/mand.png'>" . " ";
						echo $firstname . " " . $lastname; 
					} 
				?> 
			</div>
			
		</div>
		
		<div class="functions"> 
	
			<button id="addbutt" class="interactive b"> Tilføj </button>
			
			<button id="editbutt" class="interactive b"> Rediger </button>
			
			<button id="groupbutt" class="interactive b"> Gruppér </button>
			
			<?php 
			
			if (isset($admin)) {
				
				if ($admin == 1) {
			
					echo "<button id='adminbutt' class='interactive b'> Admin </button>";
				}
			}
			?>
				
			<text id="chosenbutt"> Valgte: </text>
		
		</div>
		
  		<div class="shoppinglist">  </div>

		<div class="list">

				<?php 
					mysqli_data_seek($komp, 0);
					

					if(isset($_POST['cateopt'])) {
						
						$cateval = $_POST['cateopt'];
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter WHERE category LIKE '" . $cateval . "' GROUP BY category, brand, ports");

					} elseif(isset($_POST['search'])) {
						
						$search = mysqli_real_escape_string($connection, $_POST['search']);
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter WHERE category LIKE '%$search%' OR brand LIKE '%$search%' GROUP BY category, brand, ports");
						
					} elseif(!isset($_POST['cateopt'])&&!isset($_POST['search'])) {
						
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter GROUP BY category, brand, ports ORDER BY RAND()");
					}


					echo "<ul>";
			
						while ($row = mysqli_fetch_assoc($listquery)) {
							
							$away = $row['SUM(away)'];
							$broken = $row['SUM(broken)'];
							
							$category = $row['category'];
							
							switch($category) {
								case $category == "switch": $midsec = "Porte"; $midcat = $row['ports'];
									break;
								case $category == "router": $midsec = "Hastighed"; $midcat = $row['speed'];
									break;
								case $category == "sfp-modul": $midsec = "Type"; $midcat = $row['type'];
									break;
								case $category == "el-tavle": $midsec = "Type"; $midcat = $row['type'];
									break;
								case $category == "ram-blok": $midsec = "Type"; $midcat = $row['type'];
									break;
								case $category == "cpu": $midsec = "Socket"; $midcat = $row['socket'];
									break;
								case $category == "kabel": $midsec = "Type"; $midcat = $row['type'];
									break;
								case $category == "motherboard": $midsec = "Socket"; $midcat = $row['socket'];
									break;
								
								default: $midsec = "?"; $midcat = "?";
							}
							
							
							echo "<li>";
								
								echo "<input type='checkbox' id='udenne' name='udenne'>";
							    echo "<input type='text' id='uantal' name='uantal'>";

								echo "<div id='kate'>" . $row['category'] . "</div>";

								echo "<div>" . " Mærke: " . $row['brand'] . "</div>";
								echo "<div>" . " " . $midsec . ": " . $midcat  . "</div>";
								echo "<div>" . " Antal: " . $row['amount'] . "</div>";

							echo "<br>";

								echo "<div class='status' id='firststatus' style='color: " . getColorAway($away) . "'>" . " Udlånte: " . $row['SUM(away)'] . "</div>";
							
								echo "<div class='status' style='color: " . getColorBroken($broken) . "'>" . " Ødelagte: " . $row['SUM(broken)'] . "</div>";

							
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
				
				<form name="addkomp" id="addkomp" method="post" action="ssaddkomp.php">
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
				
				<form name="adduser" id="adduser" method="post" action="ssadduser.php">
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

        //Viser tekstfelt når checkbox er clicked
        $(function () {
            if($('input[name="udenne"]').prop('checked')){
                $('input[name="uantal"]').show();
            } else {
                $('input[name="uantal"]').hide();
            }

            $('input[name="udenne"]').on('click', function () {
                if ($(this).prop('checked')) {
                    $(this).parent().find('input[name="uantal"]').show();
                } else {
                    $(this).parent().find('input[name="uantal"]').hide();
                }
            });
        });		
						
			//tilføjer og fjerne class når der bliver klikket.
		/*
		$(function(){
			var $la = $('la').click(function() {
				if($(this).hasClass('cbox')) {
					$(this).removeClass('cbox');

					} else {	
					
						$la.removeClass('cbox');
						$la.hasClass('cbox');
						$(this).addClass('cbox');
					}
			}
				)};
				*/

		
		$("document").ready(function(){
			
			var $li = $('li').click(function(e) {
				if( !$(e.target).is("input") ) {

					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');

					} else {

						$li.removeClass('selected');
						$(this).addClass('selected');
					}
				}
			});
			

			
			$("#cateopt").change(function(){
				document.getElementById('cateform').submit();
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