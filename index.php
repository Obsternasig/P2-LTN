<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="LTN.css">
	<title>Lan Team Nord</title>
</head>

<body>
<form id="login" method="post" action="loginvalidation.php">
	<div class="grid">
			<input id="box1" onkeyup="autoTab(this)" maxlength="1" size="1" autofocus>
			<input id="box2" onkeyup="autoTab(this)" maxlength="1" size="1">
            <div id="dash"><p>&#x2015;</p></div>
			<input id="box3" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input id="box4" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input id="box5" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input id="box6" onkeyup="autoTab(this)" maxlength="1" size="1">
		<input type="submit" name="submit" value="login">
	</div>
</form>

    <script type="text/javascript">
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