<script src="assets/js/sweetalert.min.js"></script>

<?php
	
	if(isset($_POST['update_room'])){

		$conn = new class_model();

		$file_location = $_SERVER['DOCUMENT_ROOT']."/strike-resort/admin/room_image/";

		$room_id = trim(stripcslashes($_POST['room_id']));
		$category_id = trim(stripcslashes($_POST['category_id']));
		$name = trim(stripcslashes($_POST['name']));
		$morning_price = trim(stripcslashes($_POST['morning_price']));
		$night_price = trim(stripcslashes($_POST['night_price']));
		$description = trim(stripcslashes($_POST['description']));

		$old_filename1 = $_POST['old_image1'];
	    $image1 = $_FILES['image1']['name'];

	    $old_filename2 = $_POST['old_image2'];
	    $image2 = $_FILES['image1']['name'];

	    $update_filename1 = "";
	    $update_filename2 = "";
	    if($image1 != NULL)
	    {
	        //renaming the image
		    $image1 = $_FILES['image1']['name'];
			$file_tmp_1 = $_FILES['image1']['tmp_name'];
			$update_filename1 = $image1;
	    }
	    else
	    {
	        $update_filename1 = $old_filename1;
	    }

	    if($image2 != NULL)
	    {
	        //renaming the image
		    $image2 = $_FILES['image2']['name'];
			$file_tmp_2 = $_FILES['image2']['tmp_name'];
			$update_filename2 = $image2;
	    }
	    else
	    {
	        $update_filename2 = $old_filename2;
	    }
	    
		$availability = trim(stripcslashes($_POST['numbers']));
		$person = trim(stripcslashes($_POST['person']));

		$update_room = $conn->update_room($category_id, $name, $morning_price, $night_price, $description, $update_filename1, $update_filename2, $availability, $person, $room_id);
		if($update_room == TRUE){
			if($image1 != NULL)
	         {
	            if(file_exists('../admin/room_image/'.$old_filename1))
	            {
	                unlink("../admin/room_image/".$old_filename1);
	            }
	            move_uploaded_file($file_tmp_1, $file_location.$image1);
	         }

	         if($image2 != NULL)
	         {
	            if(file_exists('../admin/room_image/'.$old_filename1))
	            {
	                unlink("../admin/room_image/".$old_filename1);
	            }
	            move_uploaded_file($file_tmp_2, $file_location.$image2);
	         }
			 echo '<script>localStorage.setItem("status", "updated");
			 </script>';
		}else{
			echo '<script>swal("Failed!", "Something went wrong!", "error");</script>';
		}
	}

 ?>