<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include_once ''
	
	$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('Marcus', 	'Andersen', 'MarcusAndersen@live.dk', 'Dev', 'Password');";
	mysqli_query($conn, $sql);
	
	header("location: login.php?signup=succes");
?>
</body>
</html>