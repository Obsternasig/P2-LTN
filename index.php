<<<<<<< HEAD
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
			<div class="box1"><input onkeyup="autoTab(this)" maxlength="1" size="1" autofocus></div>
			<div class="box2"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="dash"><p>&#x2015;</p></div>
			<div class="box3"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box4"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box5"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box6"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
	</div>
</form>

    <script type="text/javascript">
        var x;
        function autoTab( obj ) {
            x = obj;

            if ( obj.value.length >= obj.maxLength && obj.parentElement.nextElementSibling )
                obj.parentElement.nextElementSibling.firstElementChild.focus();
        }
    </script>
	
	
</body>
=======
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
>>>>>>> 7c4800e848497211be18056863c0e51ec3d3861e
</html>