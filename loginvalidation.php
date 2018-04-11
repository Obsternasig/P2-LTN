<?php

	require_once "adminpanel/connection.php";

   
	if(isset($_POST["initials"], $_POST["pin"]))
    {     

        $ini = $_POST["initials"];
        $pin = $_POST["pin"];

        $result1 = mysql_query("SELECT initials, pin FROM users WHERE initials = '$ini' AND  pin = '$pin'");

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