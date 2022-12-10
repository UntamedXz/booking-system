<?php 
include './head.php';
include('includes/fetch.php');
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
                                  <h4 class="text-dark ps-3 text-left" style="text-transform: uppercase;">All Staff</h4>
                                </div>
                              </div>
                              <div class="card-body">
                                <?php 
                                    $conn = new class_model();
                                    $staff = $conn->fetchstaff();
                                    ?>
                                <div class="table-responsive">
                                  <table id="tableData" class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th class="text-dark text-md opacity-10 ps-2">No.</th>
                                        <th class="text-dark text-md opacity-10">Name</th>
                                        <th class="text-dark text-md opacity-10">User Name</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Role</th>
                                        <th class="text-dark text-center ">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(!empty($staff)){ 
                                        foreach ($staff as $row){ 
                                          ?>  
                                      <tr>
                                        <td><?= $row['user_id']; ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['admin_username'] ?></td>
                                        <td><?= $row['role'] ?></td>
                                        <td style="text-align: center;">
                                          <button class="btn btn-danger btn-sm delete_D" data-del="<?= htmlentities($row['user_id']); ?>"><i  class="fas fa-trash"></i></button>
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
      swal("Success!", "Staff deleted successfully!", "success");
      localStorage.removeItem("status");
    }
  })

   $(document).ready(function() {
    $('#tableData').DataTable();  

   load_data();    
   var count = 1; 
   function load_data() {
     $(document).on('click', '.delete_D', function() {
      var delete_staff = $(this).data("del");
      console.log(delete_staff);
      get_delId(delete_staff); //argument    
      });
   }

   function get_delId(delete_staff) {
    swal({
        title: "Are you sure to delete this Staff Account?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((get_delId) => {
        if (get_delId) {
          $.ajax({
            type: 'POST',
            url: 'fetch_row/delete.php',
            data: {
            delete_staff:delete_staff
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
include './bottom.php'
?>