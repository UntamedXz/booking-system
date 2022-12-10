<?php require 'controllers/inquire.php'; ?><!-- Modal -->
<div class="modal fade" id="contactUs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">User Inquiries</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="alert"></div>
        <form  method="POST" name="registration">
         <div class="col-md-12 col-lg-12">
           <div class="row">
             <div class="col-md-12 mb-2">
              <p>
                <h5 style="text-align: center; justify-content: center;">Send an Email to strikergpresort14@gmail.com or call 09637148110 with any concerns or requests. We would be glad to respond to your inquiries and schedule a meeting with you.</h5>
              
              </p>
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="col-md-12 mb-2">
                   <label>Email Address</label>
                   <input type="email" name="email" class="form-control" placeholder="Email">
                 </div>
                 <div class="col-md-12">
                   <label>Subject</label>
                   <input type="text" name="subject" class="form-control" placeholder="Optional">
                 </div>
                 <div class="col-md-12 mb-5">
                   <label>Message</label>
                   <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>
                 </div>
                 <div class="col-md-12 col-lg-12 mb-5">
                  <button type="submit" name="inquiries" class="btn btn-dark">Send Email</button>
                </div>
        </div>
        <div class="col-md-12 col-lg-12">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.19423082188!2d120.97939321527785!3d14.41596408543847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d225d9e54d43%3A0x1658f7e20ec64b57!2sStrike%20Rgp%20Resort!5e0!3m2!1sen!2sph!4v1667191616144!5m2!1sen!2sph" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>

