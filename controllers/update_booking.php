<?php 

	if(isset($_POST['update_booking'])){

		$conn = new class_model();		
		$book_id = trim(stripcslashes($_POST['room_id']));
		$user_id = $_SESSION['user_id'];
		$reference_no = trim(stripcslashes($_POST['reference_no']));

		$update = $conn->update_booking($reference_no, $book_id);
		if($update == TRUE){
			echo '<script>alert("Refrence Number Submitted Successfully")</script><script>setTimeout(function() {  location.replace("view-bookings.php?id='.$user_id.'"); }, 1000); </script>';
		}else{
			echo '<script>alert("Failed to Submit reference Number!")</script><script>setTimeout(function() {  location.replace("view-bookings.php?id='.$user_id.'"); }, 1000); </script>';
		}

	}

 ?>