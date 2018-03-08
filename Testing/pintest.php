g<?php
//Our custom function.
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //default pin is blank.
    while($i < $digits){
        //generates a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

//4-digit PIN code.
$pin = generatePIN() ;
echo $pin, '<br>';

$servername = "localhost";
$username = "root";
$password = "";
$database = "loginsystem";

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'loginsystem');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


   