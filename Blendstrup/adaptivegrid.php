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
		
  		<div class="shoppinglist"></div>

		<div class="list"></div>

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
			
				
			<form name="addkomp" id="addkomp" method="post" action="addkomp.php">
				<div class="naddkomp">

					<p>Kategori:</p>
					<input type="text" name="category" id="category" maxlength="30">

					<p>Brand:</p>
					<input type="text" name="brand" id="brand" maxlength="30">

					<p>Serienummer:</p>
					<input type="text" name="serialnb" id="serialnb" maxlength="30">

					<p>Lokation:</p>
					<input type="text" name="location" id="location" maxlength="30">

					<p>Kommentar:</p>
					<input type="text" name="comment" id="comment" maxlength="4">

				</div>
					
					
				<div class="naddporte">
					<p>Porte:</p>
					<input type="text" name="ports" id="ports" maxlength="30">
				</div>

				<div class="naddspeed">
					<p>Hastighed:</p>
					<input type="text" name="speed" id="speed" maxlength="30">
				</div>

				<div class="naddtype">
					<p>Type:</p>
					<input type="text" name="type" id="type" maxlength="30">
				</div>

				<div class="naddsocket">
					<p>Socket:</p>
					<input type="text" name="socket" id="socket" maxlength="4">
				</div>

				<div class="naddkomp">
					<input type="submit" id="ok" value="OK">
				</div>
			</form>

			<div id="info" class="addhidingclass"></div>

		</div>
		
	</div>


	<script>

		$(document).ready(function(){
			
			$.ajax ({
					url: 'getlist.php',
					type: 'POST',
					success: function(response) {
						$('.list').html(response);
					}
			});
			
			
			$(document).on('click', '#ancheck', function () {
				if ($(this).prop('checked')) {
					$(this).parent().find('#aninput').show();
					$(this).parent().addClass('samlet');
				} else {
					$(this).parent().find('#aninput').hide();
					$(this).parent().removeClass('samlet');
				}
			});


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


			var $li = $(document).on("click", 'li', function(e) {

				if( !$(e.target).is("input") ) {

					$(".information *").hide();
					$("#addwhat").val('0');

					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');
						$('.information *').hide();

					} else {
						$('li').removeClass('selected');
						$(this).addClass('selected');
						$("#info, #info *").show();
						
						
						var Id = $(this).attr('id');

						$.ajax ({
							url: 'getinfo.php',
							type: 'POST',
							data : { id1 : Id },
							success: function(data) {
								$('#info').html(data);
							}
						});
					}
				}
			});


			$("#addbutt").click(function() {
				
				$(".information *").hide();
				$("#addwhat").val('0');
				$("#addwhat, #addwhat *, #addcancel").slideDown("fast");
				$('li').removeClass('selected');
				
			});

			$('#addwhat').change(function(){
				
				$('#addkomp, #addkomp *').hide();
				
				if (this.value=='switch') {
					$('#addkomp, .naddkomp, .naddkomp *, .naddporte, .naddporte *').show();
					
				} else if (this.value=='router') {
					$('#addkomp, .naddkomp, .naddkomp *, .naddspeed, .naddspeed *').show();
					
				} else if (this.value == 'processor' || this.value == 'motherboard') {
					$('#addkomp, .naddkomp, .naddkomp *, .naddsocket, .naddsocket *').show();
					
				} else if (this.value=='sfpmodul' || this.value=='eltavle' || this.value=='ramblok' || this.value=='kabel') {
					$('#addkomp, .naddkomp, .naddkomp *, .naddtype, .naddtype *').show();
				}
        	});

			$('#addcancel').click(function() {
				$(".information *").slideUp("fast");
				$("#addwhat").val('0');
			});
			
		});
		
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>