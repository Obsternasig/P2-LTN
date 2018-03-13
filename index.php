<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="LTN.css">
	<title>Lan Team Nord</title>
</head>

<body>
	<div class="grid">
			<div class="box1"><input onkeyup="autoTab(this)" maxlength="1" size="1" autofocus></div>
			<div class="box2"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="dash"><p>&#x2015;</p></div>
			<div class="box3"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box4"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box5"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			<div class="box6"><input onkeyup="autoTab(this)" maxlength="1" size="1"></div>
			
	</div>

    <script type="text/javascript">
        var x;
        function autoTab( obj ) {
            x = obj;

            if ( obj.value.length >= obj.maxLength && obj.parentElement.nextElementSibling )
                obj.parentElement.nextElementSibling.firstElementChild.focus();
        }
    </script>
</body>
</html>