<?php
require_once "../config/reservation_class.php";
require_once '../config/conn.php';

	if(isset($_POST['add_staff'])){

		$conn = new class_model();

		$name = trim(stripcslashes($_POST['name']));
		$username = trim(stripcslashes($_POST['username']));
		$email = trim(stripcslashes($_POST['email']));
		$image_form = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$image_size = $_FILES['image']['size'];
		$image_error = $_FILES['image']['error'];
		$password = trim(stripcslashes(md5($_POST['password'])));
		$role = trim(stripcslashes($_POST['role']));

		if($image_form == null || $image_form == '') {
			$check_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email'");
			$check_if_username_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE admin_username = '$username'");

			if(mysqli_num_rows($check_if_email_exist) > 0) {
				echo "email already used";
			} else {
				if(mysqli_num_rows($check_if_username_exist) > 0) {
					echo 'username already used';
				} else {
					$image = null;

					$add = $conn->add_staff($name,$username,$email,$password,$role, $image);

					if ($add == true){
						move_uploaded_file($image_tmp, '../admin/assets/images/' . $image);
						echo 'success';
					}
				}
			}
		} else {
			$valid_ext = ['jpg', 'png', 'jpeg'];
			$img_ext = explode('.', $image_form);
			$img_ext = strtolower(end($img_ext));

			if(!in_array($img_ext, $valid_ext)) {
				echo 'file not supported';
			} else if($image_size > 10485760) {
				echo 'file too large';
			} else {
				$check_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email'");
				$check_if_username_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE admin_username = '$username'");

				if(mysqli_num_rows($check_if_email_exist) > 0) {
					echo "email already used";
				} else {
					if(mysqli_num_rows($check_if_username_exist) > 0) {
						echo 'username already used';
					} else {
						$image = uniqid() . '.' . $img_ext;

						move_uploaded_file($image_tmp, '../admin/assets/images/' . $image);

						$add = $conn->add_staff($name,$username,$email,$password,$role, $image);

						if ($add == true){
							echo 'success';
						}
					}
				}
			}
		}
	}

 ?>