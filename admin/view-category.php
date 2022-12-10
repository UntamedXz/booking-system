<?php 
 $title = "View Category |  Booking System";
include('includes/header.php');
 ?>
		<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Category List</h6>
              </div>
            </div>
            <div class="card-body">
               <?php 
                  $conn = new class_model();
                  $category = $conn->fetchcategory();
                  ?>
              <div class="table-responsive">
                <table id="tableData" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Slug Actions</th>
                      <th class="text-dark text-center ">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($category)){ 
                      foreach ($category as $row){ 
                        ?>  
                  	 <tr>
                      <td><?= $row['name'] ?></td> 
                      <td><?= $row['slug'] ?></td>
                      <td>
                        <a href="edit-category.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"> Edit</a>
                        <button class="btn btn-danger btn-sm delete_D" data-del="<?= htmlentities($row['id']); ?>">Delete</button>
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
      var category_id = $(this).data("del");
      console.log(category_id);
      get_delId(category_id); //argument    
      });
   }

   function get_delId(category_id) {
    $.ajax({
      type: 'POST',
      url: 'fetch_row/delete.php',
      data: {
       category_id:category_id
      },
      success: function (result){
        swal({
        title: "Are you sure to delete this category?",
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