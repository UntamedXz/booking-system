<?php
	session_start();
	unset($_SESSION['admin_id']);
	unset($_SESSION['role']);
	header('location:index.php');
?>