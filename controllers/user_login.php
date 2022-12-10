<?php
require_once '../config/reservation_class.php';
require_once '../config/conn.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function verifying($email, $password) {
    global $con;
    $query_check_account = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' AND role = 'USER'");

    if(mysqli_num_rows($query_check_account) == 1) {
        $fetch_check_account = mysqli_fetch_array($query_check_account);

        if($fetch_check_account['verification_code'] == null || $fetch_check_account['verification_code'] == '') {
            return true;
        } else {
            echo 'verify again';
        }
    } else {
        return false;
    }
}
	
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = verifying($email, $password);

    if($sql == true) {
        $get_account_info = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND role = 'USER'");
        $fetch_account_info = mysqli_fetch_assoc($get_account_info);
        $_SESSION['user_id'] = $fetch_account_info['user_id'];
		$_SESSION['role_user'] = $fetch_account_info['role'];
        echo 'success';
    } else if($sql == 'verify again') {
        echo 'verify.php?email='.$email;
    } else {
        echo 'Invalid credentials!';
    }
}

if(isset($_POST['forgot'])){
    $mail = new PHPMAILER(true);
		$email = trim(stripcslashes($_POST['email']));

        $query_check_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND role = 'USER'");

        // print_r($_POST);

        if(mysqli_num_rows($query_check_if_email_exist) == 0) {
            echo 'invalid email';
        } else {
            try {
                //Enable verbose debug output
                $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
     
                //Send using SMTP
                $mail->isSMTP();
     
                //Set the SMTP server to send through
                $mail->Host = 'smtp.gmail.com';
     
                //Enable SMTP authentication
                $mail->SMTPAuth = true;
     
                //SMTP username
                $mail->Username = 'StrikeRgpResort14@gmail.com';
     
                //SMTP password
                $mail->Password = 'rzakbvemirpgtvjd';
     
                //Enable TLS encryption;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port = 587;
     
                //Recipients
                $mail->setFrom('jessicapoquiancodillo09@gmail.com', 'Strike RGP Resort');
     
                //Add a recipient
                $mail->addAddress($email);
     
                //Set email format to HTML
                $mail->isHTML(true);
     
                $verification = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
     
                $mail->Subject = 'Password reset';
                $mail->Body    = '<p>Your password reset OTP code is: <b style="font-size: 30px;">' . $verification . '</b></p>';
     
                $mail->send();
     
                // insert in users table
                $sql = mysqli_query($con, "UPDATE tbl_user SET password_reset = '$verification' WHERE email = '$email' AND role = 'USER'");

                if($sql == true) {
                    $_SESSION['otp_email'] = $email;
                    echo 'success';
                }
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
}

if(isset($_POST['otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp_code'];

    $check = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND password_reset = '$otp' AND role = 'USER'");

    $count = mysqli_num_rows($check);

    if($count == 1) {
        $query = mysqli_query($con, "UPDATE tbl_user SET password_reset = NULL WHERE email = '$email' AND role = 'USER'");

        if($query) {
            $_SESSION['password_change_email'] = $email;
            echo 'success';
        }
    } else {
        echo 'Invalid OTP code';
    }
}

if(isset($_POST['change_pass'])) {
    $email = $_POST['email'];
    $new_pass = md5($_POST['npassword']);

    $query = mysqli_query($con, "UPDATE tbl_user SET password = '$new_pass' WHERE email = '$email'");

    if($query) {
        unset($_SESSION['otp_email']);
        unset($_SESSION['password_change_email']);
        echo 'success';
    }
}

 ?>