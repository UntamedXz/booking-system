<?php
date_default_timezone_set('Asia/Manila');
$servername = "localhost";
$username = "u130950772_root";
$password = "RgpResort00";
$db_name = "u130950772_rgp_resort";

// Create connection
$con = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>