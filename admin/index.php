<?php 
    session_start();
    if(isset($_SESSION['admin_id']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'STAFF')){
        header("location: dashboard.php");
        $_SESSION['response'] = "You're Already Logged In";
        die();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Reservation System</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-success text-white"><h3 class="text-center font-weight-light my-4">Login Reservation System</h3></div>
                                    <div class="card-body">
                                        <form name="login_sform">
                                        <div id="alert"></div>
                                        <?php
                                            if(isset($_SESSION['error']))
                                                {
                                                    ?>
                                                    <div class="alert alert-danger alert-dimissible fade show" role="alert">
                                                        <?= $_SESSION['error']; ?>
                                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            } 
                                            unset($_SESSION['error']);
                                            ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" alt="username" type="text" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" alt="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="remember" onclick="myFunction()">Show Password
                                            </div>
                                            <div class="d-grid gap-2 mt-4">
                                              <button class="btn btn-primary btn-lg account-btn" id="btn-admin" name="btn-admin">Sign In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            jQuery(function(){
            $('form[name="login_sform"]').on('submit', function(e){
                e.preventDefault();

                var u_username = $(this).find('input[alt="username"]').val();
                var p_password = $(this).find('input[alt="password"]').val();

                       // var s_status = 1;

                       if (u_username === '' && p_password ===''){
                        $('#alert').html('<div class="alert alert-danger alert-dimissible fade show" role="alert"> Required username and Password!<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>');
                    }else if(p_password === '' || u_username === ''){
                        $('#alert').html('<div class="alert alert-danger">Missing Login Credentials</div>');
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: '../controllers/login_process.php',
                            data: {
                                username: u_username,
                                password: p_password,
                            },
                            beforeSend:  function(){
                                $('#alert').html('<div class="alert alert-success">Logging You In...</div>');
                            }
                        })
                        .done(function(t){
                            if (t == 0){
                                $('#alert').html('<div class="alert alert-danger">Incorrect username or password!</div>');
                            }else{
                                $("#btn-admin").html('<img src="assets/img/loading.gif" />&nbsp;Verifying your account');
                                setTimeout(' window.location.href = "dashboard.php"; ',1500);
                            }
                        });
                    }
                });
        });
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        
    }
        </script>
        <script type="text/javascript">
            document.oncontextmenu = document.body.oncontextmenu = function() {return false;}//disable right click
        </script>
    </body>
</html>
