<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fatura";
$dsn="mysql:dbname=$dbname;host=$servername";

// Create connection
$conn = new PDO($dsn,$username,$password);

?>
