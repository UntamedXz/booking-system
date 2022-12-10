
<?php 
include './head.php';
?>
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row">
                                            <div class="col-md-12">
                                              <div class="card my-4">
                                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                  <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                                    <h4 class="text-dark text-uppercase ps-3 text-left">All Clients</h4>
                                                  </div>
                                                </div>
                                                <div class="card-body">
                                                  <?php 
                                                      $conn = new class_model();
                                                      $rooms = $conn->fetchAllClients();
                                                      ?>
                                                  <div class="table-responsive">
                                                    <table id="tableData" class="table table-hover">
                                                      <thead>
                                                        <tr>
                                                          <th class="text-uppercase text-dark  font-weight-bolder opacity-7">Client Name</th>
                                                          <th class="text-uppercase text-dark  font-weight-bolder opacity-7">Client Email</th>
                                                          <th class="text-dark text-center ">Actions</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        if(!empty($rooms)){ 
                                                          foreach ($rooms as $row){ 
                                                            ?>  
                                                        <tr>
                                                          <td class="px-3"><?= $row['name'] ?></td>
                                                          <td class="px-3"><?= $row['email'] ?></td>
                                                          <td style="text-align: center;">
                                                            <a href="client-history.php?id=<?= $row['user_id'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
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

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
    </div>
</div>


  <script>
  $(window).on('load', function() {
    if(localStorage.getItem("status") == "deleted") {
      swal("Success!", "Client deleted successfully!", "success");
      localStorage.removeItem("status");
    }
  });

   $(document).ready(function() {   
    $('#tableData').DataTable(); 

   load_data();    
   var count = 1; 
   function load_data() {
     $(document).on('click', '.delete_D', function() {
      var client_id = $(this).data("del");
      console.log(client_id);
      get_delId(client_id); //argument    
      });
   }

   function get_delId(client_id) {
    swal({
        title: "Are you sure to delete this Client?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((get_delId) => {
        if(get_delId) {
          $.ajax({
          type: 'POST',
          url: 'fetch_row/delete.php',
          data: {
          client_id:client_id
          },
          success: function (result){
              localStorage.setItem("status", "deleted");
              location.reload();
          }
        });
        }
      });
  }

});
 </script>
<?php
include './bottom.php';
?>


 