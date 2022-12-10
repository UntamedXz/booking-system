<?php 
	
	if(isset($_POST['add_reply'])){

		$conn = new class_model();

		$inquire_id = trim(stripcslashes($_POST['inquire_id']));

		$message = trim(stripcslashes($_POST['message']));

		$reply_send = $conn->add_reply($message, $inquire_id);

		if($reply_send == true){
			echo '<script>alert("Inquiry Replied Successfully")</script><script>setTimeout(function() {  location.replace("../admin/view-inquire.php?id='.$inquire_id.'"); }, 1000); </script>';
		}else{
			echo '<script>alert("Reply Failed!")</script><script>setTimeout(function() {  location.replace("../admin/view-inquire.php?id='.$inquire_id.'"); }, 1000); </script>';
		}
	}



 ?>