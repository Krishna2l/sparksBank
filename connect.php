<?php 

$server="localhost";
$username="root";
$password="";
$db="sparks";

$conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
  