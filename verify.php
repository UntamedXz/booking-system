<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
require './css/login-style.php';

if(isset($_GET['email'])) {
    $email = $_GET['email'];

    if($email == '' || $email == null) {
        echo "<script>location.href='register.php';</script>";
    }
} else {
    echo "<script>location.href='register.php';</script>";
}
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
							<h4 class="card-title text-uppercase font-weight-bold">Verification</h4>
							<form id="verify_form" class="my-login-validation">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>" required readonly>
								</div>

								<div class="form-group">
									<label for="password">Verification Code</label>
                                    <input id="verification_code" type="text" class="form-control" name="verification_code" placeholder="Enter verification code" minlength="6" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" required>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block save">
										Verify
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
            $('#verify_form').on('submit', function(e) {
                e.preventDefault();

                var form = new FormData(this);
                form.append('verify', true);
                $.ajax({
                    url: "../controllers/verify.php",
                    type: "POST",
                    data: form,
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if(data.includes('success')) {
                            swal({
                                title: "Success!",
                                text: "Email verified! You can now login your account!",
                                type: "success"
                            }).then(function() {
                                window.location = "login.php";
                            });

                            swal({
                                title: "Success!",
                                text: "Email verified! You can now login your account!",
                                icon: "success",
                            })
                            .then((go) => {
                                if (go) {
                                    location.href = 'login.php';
                                }
                            });
                        } else if(data.includes('Incorrect Verification Code')) {
                            swal("Failed!", "Incorrect Verification Code!", "error");
                        } else {
                            swal({
                                title: "Failed!",
                                text: "Something went wrong!",
                                type: "error"
                            })
                        }
                    }
                })
            })
        })
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
    <?php include 'lib/script.php'; ?>
</body>