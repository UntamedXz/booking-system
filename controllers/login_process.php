<?php
	require_once "../config/reservation_class.php";
	if(ISSET($_POST)){

		$conn = new class_model();
		
		$username = trim($_POST['username']);
		$password = trim(md5($_POST['password']));

		$get_adminID = $conn->login_admin($username, $password);
		if($get_adminID['count'] > 0){
			session_start();
			$_SESSION['admin_id'] = $get_adminID['user_id'];
			$_SESSION['role'] = $get_adminID['role'];
			$_SESSION['response'] = "Welcome to your Dashboard";
			$_SESSION['type'] = "success";
			echo 1;
		}else{
			session_start();
			$_SESSION['error'] = "Login Details Incorrect. Please try again.";
			die();
		}
	}
?>
