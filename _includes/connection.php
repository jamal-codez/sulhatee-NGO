<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// offline
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "sulhatee_sulhatee";

// online
$servername = "localhost";
$username = "sulphate_sulhateev2";
$password = "Fmue9k[MRrB}";
$dbname = "sulphate_sulhatee";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>