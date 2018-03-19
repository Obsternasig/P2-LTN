<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once 'dbconnection.php';
	
	function login($initials, $pin) {
		$ini_pin = sha1($pin);
    	$result = mysqli_query($connection, "SELECT * FROM users WHERE initials='$initials' AND 	ltn_pin='$pin'");
    while($row = mysqli_fetch_array($result)) {
        $success = true;
		}
    if($success == true) {
        $_SESSION['initials']= $initials; 
        //redirect to home page
    } else {
        echo '<div class="alert alert-danger">Oops! It looks like your initials and/or pincode are incorrect. Please try again.</div>';
    }
		/*
		header('location: database')
		*/
} // END LOGIN FUNCTION
?>	
</body>
</html>
