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
			
			<a href="logout.php"> <button id="endbutton" class="interactive b">AFSLUT</button> </a>
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

					if(isset($_POST['cateopt'])) {
						
						$cateval = $_POST['cateopt'];
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, ID, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter WHERE category LIKE '" . $cateval . "' GROUP BY category, brand, ports");

					} elseif(isset($_POST['search'])) {
						
						$search = mysqli_real_escape_string($connection, $_POST['search']);
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, ID, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter WHERE category LIKE '%$search%' OR brand LIKE '%$search%' GROUP BY category, brand, ports");
						
					} elseif(!isset($_POST['cateopt'])&&!isset($_POST['search'])) {
						
						$listquery = mysqli_query($connection, "SELECT COUNT(*) AS amount, ID, category, brand, serialnb, SUM(away), SUM(broken), location, comment, ports, speed, type, socket FROM komponenter GROUP BY category, brand, ports ORDER BY RAND()");
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
							
							
							echo "<li id=" . $row['ID'] . ">";

								echo "<input type='checkbox'>";

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
				<option value="router">Router</option>
				<option value="switch">Switch</option>
				<option value="sfpmodul">SFP Modul</option>
				<option value="eltavle">El tavle</option>
				<option value="ramblok">Ram blok</option>
				<option value="processor">Processor</option>
				<option value="motherboard">Motherboard</option>
				<option value="kabel">Kabel</option>
			</select>

			<button id="addcancel" class="interactive b"> Annuller </button>
			
			<div>
				
				<form name="addkomp" id="addkomp" method="post" action="addkomp.php">
					<div class="naddkomp addhidingclass">
						<div>
							<p>Kategori:</p>
							<input type="text" name="category" id="category" maxlength="30">
						</div>

						<div>
							<p>Brand:</p>
							<input type="text" name="brand" id="brand" maxlength="30">
						</div>

						<div>
							<p>Serienummer:</p>
							<input type="text" name="serialnb" id="serialnb" maxlength="30">
						</div>

						<div>
							<p>Lokation:</p>
							<input type="text" name="location" id="location" maxlength="30">
						</div>

						<div>
							<p>Kommentar:</p>
							<input type="text" name="comment" id="comment" maxlength="4">
						</div>
					</div>
					
					
					<div class="naddporte addhidingclass">
						<p>Porte:</p>
						<input type="text" name="ports" id="ports" maxlength="30">
					</div>

					<div class="naddspeed addhidingclass">
						<p>Hastighed:</p>
						<input type="text" name="speed" id="speed" maxlength="30">
					</div>

					<div class="naddtype addhidingclass">
						<p>Type:</p>
						<input type="text" name="type" id="type" maxlength="30">
					</div>
					
					<div class="naddsocket addhidingclass">
						<p>Socket:</p>
						<input type="text" name="socket" id="socket" maxlength="4">
					</div>
					
					<div class="naddkomp addhidingclass">
						<input type="submit" id="ok" value="OK">
					</div>
				</form>
				
			</div>
			
			<!-- <div id="adduser" class="addhidingclass">
				
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
				
			</div> --->
			
			<div id="info" class="addhidingclass">
				
				<button id="sealle" class="interactive b"> Se Alle </button>

				<form>
					<select name="users" id="selecttest" class="interactive" onchange="showUser(this.value)">
						<option value="">Select a category:</option>
						<option value="switch">Switch</option>
						<option value="el-tavle">El tavle</option>
						<option value="cpu">Processor</option>
						<option value="ram-blok">Ram blok</option>
					</select>
				</form>
				
				<div id="txtHint"><b>Person info will be listed here.</b></div>
	
			</div>

		</div>
		
	</div>

	
	<script>
		
		$("document").ready(function(){
			
			
			function showUser(str) {
			if (str=="") {
				document.getElementById("txtHint").innerHTML="";
				return;
			} 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
				document.getElementById("txtHint").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","connection.php?q="+str,true);
			xmlhttp.send();
			}
			
			
			var $li = $('li').click(function(e) {
				if( !$(e.target).is("input") ) {
					
					var Id = $(this).attr('id');
					
					/* $.ajax({                    
					  url: '',     
					  type: 'post', // performing a POST request
					  data : {
						id1 : Id // will be accessible in $_POST['data1']
					  },                
					  success: function(data)         
					  {
						// etc...
					  }
					} */

					
					$("#addwhat, #addcancel").slideUp("fast");
					$("#info, #selecttest").slideDown("fast");

					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');
						$('.addhidingclass').slideUp("fast");

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
				
				$("#info, #selecttest").slideUp("fast");
				$("#addwhat, #addcancel").slideDown("fast");
				$li.removeClass('selected');
				
			});
			
			$('#addwhat').change(function(){
				
            	$('.addhidingclass').slideUp("fast");
				
				if (this.selectedIndex==2) {
					$('.naddkomp').slideDown("fast");
					$('.naddporte').slideDown("fast");
				} else if (this.selectedIndex==1) {
					$('.naddkomp').slideDown("fast");
					$('.naddspeed').slideDown("fast");
				} else if (this.selectedIndex==6 || this.selectedIndex==7) {
					$('.naddkomp').slideDown("fast");
					$('.naddsocket').slideDown("fast");
				} else if (this.selectedIndex==3 || this.selectedIndex==4 || this.selectedIndex==5 || this.selectedIndex==8) {
					$('.naddkomp').slideDown("fast");
					$('.naddtype').slideDown("fast");
				}
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