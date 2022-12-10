<?php
	require_once '../config/reservation_class.php';
	if(isset($_POST['book_now'])){

		$user_id = trim(stripcslashes($_POST['user_id']));
		$room_id = trim(stripcslashes($_POST['room_id']));
		$room_price = trim(stripcslashes($_POST['price']));
		$ages = trim(stripcslashes($_POST['age']));
		$room_type_id = trim(stripcslashes($_POST['room_type']));
		$payment_type = trim(stripcslashes($_POST['payment_type']));
		$date_accomodation = date('Y-m-d', strtotime(trim(stripcslashes($_POST['date_accomodation']))));
		$gcash_reference = trim(stripcslashes($_POST['reference_num']));
        $gcash_proof_name = $_FILES['reference_p']['name'] ?? null;
        $gcash_proof_tmpname = $_FILES['reference_p']['tmp_name'] ?? null;
        $booked_datetime = date('Y-m-d H:i:s');

		$number_p = trim(stripcslashes($_POST['number_p']));

        $gcash_proof = '';

        if($gcash_proof_name != null || $gcash_proof_name != '') {
            $imgExt = explode('.', $gcash_proof_name);
            $imgExt = strtolower(end($imgExt));

            $gcash_proof = uniqid() . '.' . $imgExt;
        }

		require_once '../config/con2.php';
		$sql = "SELECT * FROM tbl_room WHERE id = ? ";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $room_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		foreach($result as $row){
			$capacity = $row['person'];

			if($number_p > $capacity)
			{
				echo "Capacity exceeded!";
			}
			else{
                $age_ = $_POST['age'];

                $explode_age = explode(',', $age_);

                if(count($explode_age) != $number_p) {
                    echo 'Invalid input in age!';
                } else {
                    $get_fee = mysqli_query($con, "SELECT * FROM tbl_headfee WHERE id = $room_type_id");

                    $total_headfee = 0;

                    foreach($get_fee as $fee) {
                        $status = '';
                        $per_head_fee = $fee['price'];
                        foreach($explode_age as $e_age) {
                            if($e_age > 99) {
                                $status = false;
                                break;
                            } else {
                                if($e_age > 1) {
                                    $total_headfee += $per_head_fee;
                                }
                                $status = true;
                            }
                        }

                        if($status == true) {
                            $total = $room_price + $total_headfee;
                            $get_room_info = mysqli_query($con, "SELECT * FROM tbl_room WHERE id = $room_id");

                            foreach($get_room_info as $row) {
                                $total_availability = $row['availability'];

                                $check_availability = mysqli_query($con, "SELECT * FROM tbl_reservation WHERE room_id = $room_id AND room_type_id = $room_type_id AND date_accomodation = '$date_accomodation' AND status != 'PENDING' AND (check_in_out = NULL || check_in_out = 'CHECKED IN')");

                                if(mysqli_num_rows($check_availability) >= $total_availability) {
                                    echo 'Room is fully booked! Choose different room or date!';
                                } else {
                                    $conn = new class_model();
                                    $book = $conn->book_room($user_id, $room_id, $room_type_id, $payment_type, $date_accomodation, $number_p, $room_price, $total_headfee, $age_, $per_head_fee, $booked_datetime, $gcash_proof, $gcash_reference, $total);
                                    if($book == TRUE){
                                        if($gcash_proof_name != null || $gcash_proof_name != '') {
                                            move_uploaded_file($gcash_proof_tmpname, '../gcash_proof/' . $gcash_proof);
                                        }
                                        echo 'success';
                                    }
                                }
                            }
                        } else {
                            echo 'Invalid input in age!';
                        }
                    }
                }
			}

		}
	}

    if(isset($_POST['check_availability'])) {
        $room_id = $_POST['roomid'];
        $date = date('Y-m-d', strtotime($_POST['check_date']));
        $get_room_info = mysqli_query($con, "SELECT * FROM tbl_room WHERE id = $room_id");

        foreach($get_room_info as $row) {
            $total_availability = $row['availability'];

            $get_morning_availability = mysqli_query($con, "SELECT * FROM tbl_reservation WHERE room_id = $room_id AND room_type_id = 1 AND date_accomodation = '$date' AND status != 'PENDING' AND (check_in_out = NULL || check_in_out = 'CHECKED IN')");
            $get_night_availability = mysqli_query($con, "SELECT * FROM tbl_reservation WHERE room_id = $room_id AND room_type_id = 2 AND date_accomodation = '$date' AND status != 'PENDING' AND (check_in_out = NULL || check_in_out = 'CHECKED IN')");

            $booked_count_morning = mysqli_num_rows($get_morning_availability);
            $booked_count_night = mysqli_num_rows($get_night_availability);

            $morning_availability = $total_availability - $booked_count_morning;
            $night_availability = $total_availability - $booked_count_night;

            $data['morning'] = $morning_availability;
            $data['night'] = $night_availability;

            echo json_encode($data);
        }
    }

 ?>