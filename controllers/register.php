<?php
require_once '../config/reservation_class.php';
require_once '../config/conn.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
	
	if(isset($_POST['register'])){
        $mail = new PHPMAILER(true);
		$name = trim(stripcslashes($_POST['name']));
		$email = trim(stripcslashes($_POST['email']));
		$password = md5(trim($_POST['password']));

        $query_check_if_email_exist = mysqli_query($con, "SELECT * FROM tbl_user WHERE email = '$email' AND role = 'USER'");

        // print_r($_POST);

        if(mysqli_num_rows($query_check_if_email_exist) > 0) {
            echo 'email already exist';
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
                $mail->addAddress($email, $name);
     
                //Set email format to HTML
                $mail->isHTML(true);
     
                $verification = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
     
                $mail->Subject = 'Email verification';
                $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification . '</b></p>';
     
                $mail->send();
     
                // insert in users table
                $sql = add_user($name, $email, $password, $verification);

                if($sql == true) {
                    $_SESSION['email'] = $email;
                    echo 'verify.php?email='.$email;
                }
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
	}

 ?>