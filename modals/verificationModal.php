
<!-- Modal -->
<div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Email Verification</h1>
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
               <label>Email</label>
               <input type="email"  id="email" name="email" alt="name" class="form-control" placeholder="Enter Email" value="" readonly>
             </div>
           
           <div class="col-md-12 mb-2">
               <label>Verification Code</label>
               <input type="text"  id="verification_code" name="verification_code" alt="email" class="form-control" placeholder="Enter Verification Code">
             </div>
         </div>
         <center><button type="submit" name="userLogin" class="btn btn-info"  style="width: 100%;" height="50" >Verified</button> </center>
      </div>
       </form>
    </div>
  </div>
</div>
</div>