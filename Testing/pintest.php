<<<<<<< HEAD
g<?php
//Our custom function.
=======
<?php
//Custom function.
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //Default pin is blank.
    while($i < $digits){
        //Generates a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

//4-digit PIN code.
$pin = generatePIN(4) ;
echo $pin, '<br>';


// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'loginsystem');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully", '<br>';

$query = "SELECT * FROM users WHERE column_name = user_id";
if ($result = mysqli_query($conn, $query))
{
	if (mysql_num_rows($result) > 0);
}
{
	echo "$pin";
}
?>
