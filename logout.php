<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['role_user']);
	header('location:index.php');
?>