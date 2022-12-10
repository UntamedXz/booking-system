<?php
require_once '../config/reservation_class.php';
require_once '../config/conn.php';
session_start();

function verifying($email, $verification) {
    global $con;
    $query_check_verification_code = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND verification = '$verification'");

    if(mysqli_num_rows($query_check_verification_code) == 1) {
        $remove_vcode = mysqli_query($con, "UPDATE tbl_user SET verification = NULL WHERE email = '$email'");

        if($remove_vcode) {
            return true;
        }
    } else {
        return false;
    }
}
	
if(isset($_POST['verify'])){
    $email = $_POST['email'];
    $verification = $_POST['verification_code'];

    $sql = verifying($email, $verification);

    if($sql == true) {
        $_SESSION['verified'] = true;
        echo 'success';
    } else {
        echo 'Incorrect Verification Code';
    }
}

 ?>