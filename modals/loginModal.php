
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Log In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
          if(isset($_SESSION['error']))
          {
            ?>
            <div class="alert alert-danger alert-dimissible fade show" role="alert"><?= $_SESSION['error']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          }
          unset($_SESSION['error']);
         ?>
       <form name="login_sform">
          <div id="alert"></div>
         <div class="col-md-12 col-lg-12">
           <div class="row">
           <div class="col-md-12 mb-2">
               <label>Full Name</label>
               <input type="name"  id="name" alt="name" class="form-control" placeholder="Enter Name">
             </div>
           
           <div class="col-md-12 mb-2">
               <label>Email</label>
               <input type="email"  id="email" alt="email" class="form-control" placeholder="Email Address">
             </div>
             
             <div class="col-md-12 mb-2">
               <label>Password</label>
               <input type="password"  id="password" alt="password" class="form-control" placeholder="Password">
             </div>
           </div>
           <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" onclick="myFunction()">Show Password
              </div>
         </div>
         <center><button name="userLogin" class="btn btn-info"  style="width: 100%;" height="50" >Log in</button> </center>
      </div>
      <div class="modal-footer ">
        <p>Not a member yet?</p>
        <a href="#registerModal" aria-current="page" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</a>
      </div>
       </form>
    </div>
  </div>
</div>

<script>
  jQuery(function(){
    $('form[name="login_sform"]').on('submit', function(e){
      e.preventDefault();

      var user_email = $(this).find('input[alt="email"]').val();
      var p_password = $(this).find('input[alt="password"]').val();

                       // var s_status = 1;

                       if (user_email === '' && p_password ===''){
                        $('#alert').html('<div class="alert alert-danger alert-dimissible fade show" role="alert"> Required email and Password!<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>');
                      }else if(p_password === '' || user_email === ''){
                        $('#alert').html('<div class="alert alert-danger">Missing Login Credentials</div>');
                      }else{
                        $.ajax({
                          type: 'POST',
                          url: 'controllers/user_login.php',
                          data: {
                            email: user_email,
                            password: p_password,
                          },
                          beforeSend:  function(){
                            $('#alert').html('<div class="alert alert-warning">Logging You In...</div>');
                          }
                        })
                        .done(function(t){
                          if (t == 0){
                            $('#alert').html('<div class="alert alert-danger">Incorrect username or password!</div>');
                            setTimeout(' window.location.href = "index.php"; ',1500);
                          }else{
                            $("#btn-admin").html('<img src="admin/assets/img/loading.gif" />&nbsp;Verifying your account');
                            setTimeout(' window.location.href = "index.php"; ',1500);
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