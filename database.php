<?php
// $_POST = array();

// Variables
$hostName = "localhost";
$databaseUser = "root";
$databasePassword = "";
$databaseName = "register_login_form";

$conn = mysqli_connect($hostName, $databaseUser, $databasePassword, $databaseName);

if (!$conn) {
  die("". mysqli_connect_error());
}

?>