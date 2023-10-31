<?php
// Variables
$hostName = "localhost";
$databaseUser = "root";
$databasePassword = "";
$databaseName = "register_login";

$conn = mysqli_connect($hostName, $databaseUser, $databasePassword, $databaseName);

if (!$conn) {
  die("". mysqli_connect_error());
}

?>