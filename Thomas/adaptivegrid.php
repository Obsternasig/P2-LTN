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
			
			<?php 
			
			if (isset($admin)) {
				
				if ($admin == 1) {
			
					echo "<button id='adminbutt' class='interactive b'> Admin </button>";
				}
			}
			?>
		
		</div>

		<div class="end2">
			<button id="endbutton" class="interactive b" onclick="window.location.replace ('logout.php');">Afslut</button>
		</div>
		
		<div class="list"></div>

		<div class="information">
			<div id="formdiv"></div>
		</div>
		
	</div>


	<script>

		$(document).ready(function(){
			
			$.ajax ({
					url: 'getlist.php',
					success: function(response) {
						$('.list').html(response);
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
			
			
			$(".grid").on('click', '.komps', function(e) {
				if( !$(e.target).is("input") ) {
					
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
				}
			});
			
			
			$(".grid").on('click', 'li', function(e) {

				if( !$(e.target).is("input") ) {

					$("#addwhat").val('0');
					
					var Id = $(this).attr('id');

					if($(this).hasClass('selected')) {

						$(this).removeClass('selected');
						$('#div' + Id).slideUp("fast", function() { $(this).empty(); } );

					} else {
						
						$(this).addClass('selected');

						$.ajax ({
							url: 'getkomps.php',
							type: 'POST',
							data : { id1 : Id },
							success: function(response) {
								$('#div' + Id).html(response).slideDown("fast");
							}
						});
					}
				}
			});


			$(".grid").on('click', '#addbutt', function() {
				
				//$(this).addClass('btoggle');
				$(".information").empty();
				$("#addwhat").val('0');
				$('li').removeClass('selected');
				$('.divID').slideUp("fast", function() { $(this).empty(); } );
				
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

			
			
			$(".grid").on('click', '#addcancel', function() {
				$(".information *").slideUp("fast", function(){
					$(".information").empty();
					$("#addwhat").val('0');
				});
			});
			
			
			/* $(".grid").on('click', '#editbutt', function() {
				
				$(".information").empty();
				$("#editkomp").val('0');
				$('li').removeClass('selected');
				$('#testdivID').slideUp("fast", function() { $(this).empty(); } );
				
				var initial = "set";
				
				$.ajax ({
					url: 'editform.php',
					type: 'POST',
					data: { initial : initial },
					success: function(response) {
						$('.information').html(response);
					}
			}); */
		});
		
	</script>
	
</body>
</html>

<?php
	mysqli_close($connection);
?>