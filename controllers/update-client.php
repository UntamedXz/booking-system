<?php
require_once '../config/conn.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	function sendNotification($user_email, $number_p, $client_name, $room_name, $date_f,$pay_type, $total_price, $status)
	{
		$mail = new PHPMailer(true);
		$mail->isSMTP();  
		$mail->SMTPAuth = true;         


	    $mail->Host  	  = 'smtp.gmail.com';                    
	    $mail->Username   = 'strikergpresort14@gmail.com';                    
	    $mail->Password   = 'zomuyffzzilselfd';   

	    $mail->SMTPSecure = "tls";
	    $mail->Port = 587;

	    $mail->setFrom('jshpch72@gmail.com');
    	$mail->addAddress($user_email); 

    	$mail->isHTML(true);                                  
    	$mail->Subject = 'Email Notification From Strike RGP Resort';

    	$email_template = "
   <!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1' />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Favicon -->
		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<h1>Strike RGP Resort </h1>
		<div class='invoice-box'>
			<table>
				<tr class='top'>
					<td colspan='2'>
						<table>
							<tr>
								<td>
									Date Paid &nbsp; ".$date_f."
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

				<tr class='heading'>
					<td>Costumer Name</td>

					<td>".$client_name."</td>
				</tr>

				<tr class='heading'>
					<td>Email Address</td>

					<td>".$user_email."</td>
				</tr>

				<tr class='heading'>
					<td>Payment Method</td>

					<td>".$pay_type."</td>
				</tr>

				<tr class='heading'>
					<td>Room Name</td>

					<td>".$room_name."</td>
				</tr>

				<tr class='heading'>
					<td>Total Persons</td>

					<td>".$number_p."</td>
				</tr>

				<tr class='heading'>
					<td>Total</td>

					<td>Price  ".number_format($total_price)."</td>
				</tr>

				<tr class='item'>
					<td>Status</td>

					<td>".$status."</td>
				</tr>
				<tr class='information'>
					<td colspan='2'>
						<table>
							<tr>
								<td>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Strike RGP Resort All Right Reserved 2022
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
    	";

    	$mail->Body = $email_template;
    	$mail->send();

	}
	
	if(isset($_POST['confirm'])){

		$conn = new class_model();

		$book_id = trim(stripcslashes($_POST['book_id']));
        $confirmed_date = date('Y-m-d H:i:s');

        $update_client = mysqli_query($con, "UPDATE `tbl_reservation` SET `status` = 'CONFIRMED', confirmed_date = '$confirmed_date' WHERE `id` = $book_id");

		if($update_client){
			echo '<script>
            localStorage.setItem("status", "confirmed");
            </script>';
		}else{
			echo '<script>alert("Client Status Update Failed!")</script><script>setTimeout(function() {  location.replace("../admin/view-client.php?reservationID='.$book_id.'"); }, 1000); </script>';
		}
	}
	else if(isset($_POST['PAID'])){

		$conn = new class_model();
		$number_p = $_POST['number_p'];
		$client_name = $_POST['client_name'];
		$room_name = $_POST['room_name'];
		$day_acc = $_POST['day_acc'];
		$pay_type = $_POST['pay_type'];
		$date_f = $_POST['date_f'];
		$book_id = trim(stripcslashes($_POST['book_id']));
		$room_id = trim(stripcslashes($_POST['room_id']));
	   	$total_price = trim(stripcslashes($_POST['total_price']));
	   	$user_email = $_POST['user_email'];
	   	$status = $_POST['status'];
        $paid_date = date('Y-m-d H:i:s');
		
        $update_client = mysqli_query($con, "UPDATE `tbl_reservation` SET `status` = 'PAID', `paid_date` = '$paid_date' WHERE `id` = $book_id");

        if($update_client) {
            echo '<script>
            localStorage.setItem("status", "paid");
            </script>';
        }
	}
	else if(isset($_POST['check_in'])){
		$conn = new class_model();

		$book_id = trim(stripcslashes($_POST['book_id']));
        $checked_in_date = date('Y-m-d H:i:s');
        $update_client = mysqli_query($con, "UPDATE `tbl_reservation` SET `check_in_out` = 'CHECKED IN', checked_in_date = '$checked_in_date' WHERE `id` = $book_id");

        if($update_client) {
            echo '<script>
            localStorage.setItem("status", "checked_in");
            </script>';
        }
	}

	else if(isset($_POST['check_out'])){
		$conn = new class_model();

		$book_id = trim(stripcslashes($_POST['book_id']));
        $checked_out_date = date('Y-m-d H:i:s');
        $update_client = mysqli_query($con, "UPDATE `tbl_reservation` SET `check_in_out` = 'CHECKED OUT', checked_out_date = '$checked_out_date' WHERE `id` = $book_id");

        if($update_client) {
            echo '<script>
            localStorage.setItem("status", "checked_out");
            </script>';
        }
	}

 ?>