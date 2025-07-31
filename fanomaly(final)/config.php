<?php
// config.php

$dbhost = 'localhost';
$dbuser = 'root';       // Change if needed
$dbpass = '';           // Change if needed
$dbname = 'fanomoly';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
