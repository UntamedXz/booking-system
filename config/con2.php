<?php 
date_default_timezone_set('Asia/Manila');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = new mysqli("localhost", "u130950772_root", "RgpResort00", "u130950772_rgp_resort");
	if($conn->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}

?>