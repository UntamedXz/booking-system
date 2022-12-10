<?php
	
	if(isset($_POST['inquiries'])){

		$conn = new class_model();

		$user_id = $_SESSION['user_id'];
		$name = trim(stripcslashes($_POST['name']));
		$email = trim(stripcslashes($_POST['email']));
		$subject = trim(stripcslashes($_POST['subject']));
		$message = trim(stripcslashes($_POST['message']));

		$add = $conn->inquiry($name, $user_id, $email, $subject, $message);
		if($add == true){
			echo '<script>alert("Your Inquiry has been sent!")</script><script>setTimeout(function() {  location.replace("my-inquiries.php"); }, 1000); </script>';
		}else{
			echo '<script>alert("Inquiry Failed!")</script><script>setTimeout(function() {  location.replace("index.php"); }, 1000); </script>';
		}
	}

	else if(isset($_POST['read_reply'])){
		$conn = new class_model();

		$user_id = $_SESSION['user_id'];

		$read = $conn->read($user_id);

		if($read == true){
			echo '<script>alert("Reply, Marked as read")</script><script>setTimeout(function() {  location.replace("view-reply.php?id='.$user_id.'"); }, 1000); </script>';
		}else{
			echo '<script>alert("Inquiry Failed!")</script><script>setTimeout(function() {  location.replace("view-reply.php?id='.$user_id.'"); }, 1000); </script>';
		}
	}

	else if(isset($_POST['read_reply_0'])){
		$conn = new class_model();

		$user_id = $_SESSION['user_id'];

		$read = $conn->read_0($user_id);

		if($read == true){
			echo '<script>alert("Reply, Marked as Unread")</script><script>setTimeout(function() {  location.replace("view-reply.php?id='.$user_id.'"); }, 1000); </script>';
		}else{
			echo '<script>alert("Inquiry Failed!")</script><script>setTimeout(function() {  location.replace("view-reply.php?id='.$user_id.'"); }, 1000); </script>';
		}
	}

 ?>