<?php 

	include '../../config/con2.php';

	if(isset($_POST['room_id'])){
		$id = $_POST['room_id'];

	    $sql = "DELETE FROM tbl_room WHERE id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $id);
	    $stmt->execute([$id]);
	 }

	 else if(isset($_POST['category_id'])){
	 	$id = $_POST['category_id'];

	    $sql = "DELETE FROM room_category WHERE id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $id);
	    $stmt->execute([$id]);
	 }

	 else if(isset($_POST['delete_staff'])){
	 	
	 	$user_id = $_POST['delete_staff'];

	 	$sql = "DELETE FROM tbl_user WHERE user_id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $user_id);
	    $stmt->execute([$user_id]);
	 }

	 else if(isset($_POST['inquire_id'])){
	 	$id = $_POST['inquire_id'];

	 	$sql = "DELETE FROM tbl_inquiries WHERE id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $id);
	    $stmt->execute([$id]);

	 }
	 else if(isset($_POST['inquire_id'])){
	 	$inquire_id = $_POST['inquire_id'];

	 	$sql = "DELETE FROM tbl_inquiries WHERE id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $inquire_id);
	    $stmt->execute([$inquire_id]);
	 }

	 else if(isset($_POST['reserve_id'])){
	 	$reserve_id = $_POST['reserve_id'];

	 	$sql = "DELETE FROM tbl_reservation WHERE id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $reserve_id);
	    $stmt->execute([$reserve_id]);
	 }
	 else if(isset($_POST['client_id'])){
	 	$client_id = $_POST['client_id'];

	 	$sql = "DELETE FROM tbl_user WHERE user_id = ? ";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $client_id);
	    $stmt->execute([$client_id]);
	 }
?>