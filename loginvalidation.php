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
   
	if(isset($_POST["name"], $_POST["password"])) 
    {     

        $name = $_POST["name"]; 
        $password = $_POST["password"]; 

        $result1 = mysql_query("SELECT username, password FROM Users WHERE username = '".$name."' AND  password = '".$password."'");

        if(mysql_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true;
			$_SESSION["naam"] = $name; 
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
	}
 
?>	
</body>
</html>
