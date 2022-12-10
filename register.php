<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
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
							<h4 class="card-title">Register</h4>
							<form id="signup_form" class="my-login-validation">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<div class="password-container">
                                        <input id="reg_password" type="password" class="form-control" name="password" required>
                                        <span id="eye">SHOW</span>
                                    </div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block save">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a style="color: #38a0a6;"  href="login.php">Login</a>
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
            const passwordInput = document.querySelector("#reg_password")
            const eye = document.querySelector("#eye")
        
            eye.addEventListener("click", function(){
                if(passwordInput.type ===  "password") {
                    eye.textContent = "HIDE";
                    passwordInput.type = 'text';
                } else {
                    eye.textContent = "SHOW";
                    passwordInput.type = 'password';
                }
            })
        
            $('#signup_form').on('submit', function(e) {
                e.preventDefault();

                var email = $('#email').val();
                var form = new FormData(this);
                form.append('register', true);
                $.ajax({
                    url: "../controllers/register.php",
                    type: "POST",
                    data: form,
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if(data.includes("verify.php")) {
                            location.href = data;
                        } else if(data.includes("email already exist")) {
                            swal("Failed!", "Email already used!", "error");
                        }
                        console.log(data);
                    }
                })
            })
        })
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
    <?php include 'lib/script.php'; ?>
</body>