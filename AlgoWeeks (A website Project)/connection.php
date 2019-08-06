<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="mydb";
// Create connection
$link = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>