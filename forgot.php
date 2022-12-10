<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
if(isset($_SESSION['user_id'])) {
    echo '<script>location.href="index.php";</script>';
}
require 'lib/header.php';
require 'lib/nav.php';
require './css/login-style.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	.save {
		background-color: #38a0a6 !important;
        border: 1px solid #38a0a6 !important;
	}

	.save:hover {
		background-color: #1c465a !important;
        border: 1px solid #1c465a !important;
	}
	
	.data_eye {
		background-color: #38a0a6 !important;
        border: 1px solid #38a0a6 !important;
	}

	.data_eye:hover {
		background-color: #1c465a !important;
        border: 1px solid #1c465a !important;
        color: #1c465a !important;
	}
</style>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper mt-5">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Forgot Password</h4>
							<form id="forgot_form" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    <div class="form-text text-muted">
										By clicking "Reset Password" we will send a password reset link
									</div>
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block save" id="btn">
										Reset Password
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <script>
	    $(document).ready(function() {
            $('#forgot_form').on('submit', function(e) {
                e.preventDefault();
                var form = new FormData(this);
                form.append('forgot', true);
                $.ajax({
                    url: "../controllers/user_login.php",
                    type: "POST",
                    data: form,
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#btn').prop('disabled', true);
                        $('#btn').text('Processing...');
                    },
                    complete: function() {
                        $('#btn').prop('disabled', false);
                        $('#btn').text('Reset Password');
                    },
                    success: function(data) {
                        if(data == 'success') {
                            location.href = 'otp.php';
                        } else if(data == 'invalid email') {
                            swal("Failed!", "Email not registered!", "error");
                        } else {
                            swal("Failed!", "Something went wrong!", "error");
                        }
                        console.log(data);
                    }
                })
            })
        })
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
<?php include 'lib/script.php'; ?>