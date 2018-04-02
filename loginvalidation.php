<?php

	require_once "connection.php";

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
   
	if(isset($_POST["initials"], $_POST["ltn_pin"]))
    {     

        $ini = $_POST["initials"];
        $pin = $_POST["ltn_pin"];

        $result1 = mysql_query("SELECT initials, ltn_pin FROM users WHERE initials = '$ini' AND  ltn_pin = '$pin'");

        if(mysql_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true;
			$_SESSION["initials"] = $ini;
        }
        else
        {
            echo 'Your initials or pin are incorrect!';
        }
	}
 
?>	
</body>
</html>
