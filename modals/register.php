<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User Registration</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="alert"></div>
       <form id="registration_form" name="registration">
         <div class="col-md-12 col-lg-12">
           <div class="row">
             <div class="col-md-12 mb-2">
               <label>Full Name</label>
               <input type="text" name="name" class="form-control" placeholder="Full Name" required>
             </div>
             <div class="col-md-12 mb-2">
               <label>Email Address</label>
               <input type="email" name="email" class="form-control" placeholder="Email Address" required>
             </div>
             <div class="col-md-12 mb-2">
               <label>Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password" required>
             </div>
           </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="register" class="btn btn-success">Register Now</button>
      </div>
       </form>
    </div>
  </div>
</div>