<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
	<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
    <div class="page-header">
        <h1>You are now logged out,<b><?php echo htmlspecialchars($_SESSION['username']); ?></b>.We hope to see you again!</h1>
    </div>
</body>
</html>