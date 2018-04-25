<?php

	session_start();

?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="adaptivegrid.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title> Login </title>
</head>

<body>
	<div class="pingrid">
		
		<form name="pincheck" id="pincheck" method="post" action="loginvalidation.php">
			<input class="interactive" id="ini1" name="ini1" maxlength="1" autocomplete="off" autofocus>
			<input class="interactive" id="ini2" name="ini2" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin1" name="pin1" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin2" name="pin2" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin3" name="pin3" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin4" name="pin4" maxlength="1" autocomplete="off">
		</form>
		
		<div class='loginfail'> 
			<p>
				<?php

					if(isset($_SESSION['loginfail'])) {

						$login = $_SESSION['loginfail'];

						if($login == 1){
							echo "Dine initialer og/eller pinkode var forkert, prøv igen";
							
							} else {
							
							echo "";
						}
					}
				?>
			</p> 
		</div>
		
	</div>
	
	
    <script>
		
		$("document").ready(function(){
			
			$('input').keydown(function () {
				
				if (this.value.length == this.maxLength) {
					$(this).next('input').focus();
					
				} else if (this.value.length == 0) {
					
					$(this).prev('input').focus();
				}
			});

			
			$(document).on('keyup', '#pin4', function() {
   				
				$("#pincheck").submit();
				
			});
		});
		
    </script>
</body>
</html>