<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="adaptivegrid.css">
	<title> Blendstrup </title>
</head>

<body>
	<div class="pingrid">
		<form name="pincheck" id="pincheck" method="post" action="loginvalidation.php">
			<input class="interactive" id="ini1" name="ini1" onkeyup="autoTab(this)" maxlength="1" autocomplete="off" autofocus>
			<input class="interactive" id="ini2" name="ini2" onkeyup="autoTab(this)" maxlength="1" autocomplete="off">
            <div class="dash">&#x2015;</div>
			<input class="interactive" id="pin1" name="pin1" onkeyup="autoTab(this)" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin2" name="pin2" onkeyup="autoTab(this)" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin3" name="pin3" onkeyup="autoTab(this)" maxlength="1" autocomplete="off">
			<input class="interactive" id="pin4" name="pin4" onkeyup="autoTab(this)" maxlength="1" autocomplete="off">
		</form>
	</div>

    <script>
        function autoTab( obj ) {
            if ( obj.value.length >= obj.maxLength && obj.nextElementSibling ) {
                nextElementSiblingInput(obj).focus();
            } else if(obj.value.length === 0) {
                previousElementSiblingInput(obj).focus();
            }
        }

        function nextElementSiblingInput(element) {
            do {
                element = element.nextElementSibling;
            } while (element.nodeName !== "INPUT");
            return element;
        }

        function previousElementSiblingInput(element) {
            do {
                element = element.previousElementSibling;
            } while (element.nodeName !== "INPUT");
            return element;
        }
    </script>
</body>
</html>