<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="LTN.css">
	<title>Lan Team Nord</title>
</head>

<body>
	<div class="grid">
			<input class="box1" onkeyup="autoTab(this)" maxlength="1" size="1" autofocus>
			<input class="box2" onkeyup="autoTab(this)" maxlength="1" size="1">
            <div class="dash"><p>&#x2015;</p></div>
			<input class="box3" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input class="box4" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input class="box5" onkeyup="autoTab(this)" maxlength="1" size="1">
			<input class="box6" onkeyup="autoTab(this)" maxlength="1" size="1">
	</div>

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