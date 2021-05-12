<?php

session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "vidupload";

$dbConnect = mysqli_connect($host, $username, $password, $db);

if(!$dbConnect)
{
    die("Unable to connect...!". mysqli_connect_error());
}


?>