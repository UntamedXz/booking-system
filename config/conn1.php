<?php
date_default_timezone_set('Asia/Manila');
$servername = "localhost";
$username = "u130950772_root";
$password = "RgpResort00";
$dbname = "u130950772_rgp_resort";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>