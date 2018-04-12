<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="adaptivegrid.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title> Blendstrup </title>
</head>

<body>
	<div class="pingrid">
		<form name="pincheck" id="pincheck" method="post" action="loginvalidation.php" autocomplete="off">
			<input class="interactive" id="ini1" name="ini1" maxlength="1" autofocus>
			<input class="interactive" id="ini2" name="ini2" maxlength="1">
			<input class="interactive" id="pin1" name="pin1" maxlength="1">
			<input class="interactive" id="pin2" name="pin2" maxlength="1">
			<input class="interactive" id="pin3" name="pin3" maxlength="1">
			<input class="interactive" id="pin4" name="pin4" maxlength="1">
		</form>
	</div>

    <script>
		
		$("document").ready(function(){
			
			$('input').keyup(function () {
				
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