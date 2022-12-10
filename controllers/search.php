<?php 

	require_once "config/reservation_class.php"; 

	if(isset($_POST['search'])){

		$conn = new class_model();

		$checkin = $_POST['start'];
		$checkout = $_POST['end'];
		$number_p = $_POST['number_p'];
		$room_type = $_POST['room_type'];

		$search = $conn->search($checkin,$checkout,$number_p,$room_type);

		if($search == true){
			echo '<script>setTimeout(function() {  location.replace("search-result.php"); }, 1000); </script>';
		}else{
			echo '<script>setTimeout(function() {  location.replace("search-result.php"); }, 1000); </script>';
		}
	}


 ?>