<?php
	
	if(isset($_POST['room_add'])){

		$conn = new class_model();

		$category_id = trim(stripcslashes($_POST['category_id']));
		$name = trim(stripcslashes($_POST['name']));
		$morning_price = trim(stripcslashes($_POST['morning_price']));
		$night_price = trim(stripcslashes($_POST['night_price']));
		$description = trim(stripcslashes($_POST['description']));

		$image1 = $_FILES['image1']['name'];
		$file_tmp_1 = $_FILES['image1']['tmp_name'];

		$image2 = $_FILES['image2']['name'];
		$file_tmp_2 = $_FILES['image2']['tmp_name'];

		// $images = [];
		// $images = [$image1, $image2, $image3, $image4];
		// $datas = implode('', $images);

		$file_location = "./room_image/";
	    

		$availability = trim(stripcslashes($_POST['numbers']));
		$person = trim(stripcslashes($_POST['person']));

		$add = $conn->add_room($category_id, $name, $morning_price, $night_price, $description, $image1, $image2, $availability, $person);
		if($add == TRUE){
			 move_uploaded_file($file_tmp_1, $file_location.$image1);
			 move_uploaded_file($file_tmp_2, $file_location.$image2);
			 echo '<script>localStorage.setItem("status", "added");
			 location.replace("add-room.php");
			 </script>';
		}else{
			echo '<script>swal("Failed!", "Something went wrong!", "error");</script>';
		}
	}
 ?>