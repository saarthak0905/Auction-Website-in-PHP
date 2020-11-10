<?php
$servername = "localhost";
$username = "root";
$password = "saarthak1238";
$database = "auction";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

