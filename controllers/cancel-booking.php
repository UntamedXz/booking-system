<?php
	require_once '../config/reservation_class.php';
    require_once '../config/conn.php';

	if(isset($_POST['cancel'])){

		$book_id = $_POST['book_id'];

        $cancel = mysqli_query($con, "DELETE FROM tbl_reservation WHERE id = $book_id");

        if($cancel) {
            echo 'cancelled';
        }
	}

 ?>