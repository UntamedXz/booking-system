<?php 
$title = "View All Inquiries | Booking System";
include('includes/header.php');
?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-13">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Inquiry List</h6>
              </div>
            </div>
            <div class="card-body">
               <?php 
                  $conn = new class_model();
                  $inquire = $conn->Inquire();
                  ?>
              <div class="table-responsive">
                <table id="tableData" class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark  font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-dark  font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-dark  font-weight-bolder opacity-7">Subject</th>
                      <th class="text-dark text-center ">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($inquire)){ 
                      foreach ($inquire as $row){ 
                        ?>  
                  	 <tr>
                      <td class="px-3"><?= $row['name'] ?></td>
                      <td class="px-3"><?= $row['email'] ?></td>
                      <td class="px-3"><?= $row['subject']; ?></td>
                      <td>
                        <a href="view-inquire.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i></a>
                        <button class="btn btn-danger btn-sm delete_D" data-del="<?= htmlentities($row['id']); ?>"><i  class="fas fa-trash"></i></button>
                      </td> 
                     </tr>
                     <?php
                      } 
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>



<?php
include('includes/scripts.php'); 
include('includes/footer.php');
?>	


<script>
   $(document).ready(function() {   
   load_data();    
   var count = 1; 
   function load_data() {
     $(document).on('click', '.delete_D', function() {
      var inquire_id = $(this).data("del");
      console.log(inquire_id);
      get_delId(inquire_id); //argument    
      });
   }

   function get_delId(inquire_id) {
    $.ajax({
      type: 'POST',
      url: 'fetch_row/delete.php',
      data: {
       inquire_id:inquire_id
      },
      success: function (result){
        swal({
        title: "Are you sure to delete this Inquiry?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((get_delId) => {
        if (get_delId) {
          location.reload();
        }
      });
      }
    });
  }

});
 </script>