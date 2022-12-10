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
                <h6 class="text-white text-capitalize ps-3 text-center">Room List</h6>
              </div>
            </div>
            <div class="card-body">
               <?php 
                  $conn = new class_model();
                  $rooms = $conn->fetchRooms();
                  ?>
              <div class="table-responsive">
                <table id="tableData" class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-dark  font-weight-bolder opacity-7">Room Name</th>
                      <th class="text-dark  font-weight-bolder opacity-7">Room Description</th>
                      <th class="text-dark  font-weight-bolder opacity-7">price</th>
                      <th class=" text-dark  font-weight-bolder opacity-7">Available Room</th>
                      <th class=" text-dark  font-weight-bolder opacity-7">Image</th>
                      <th class="text-dark text-center ">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($rooms)){ 
                      foreach ($rooms as $row){ 
                        ?>  
                  	 <tr>
                      <td class="px-3"><?= $row['room_name'] ?></td>
                      <td class="px-3"><?= $row['description'] ?></td>
                      <td class="px-3"><?= number_format($row['price']); ?></td>
                      <td class="px-3"><?= $row['availability'] ?></td>
                      <td>
                        <img class="w-25 img-thumbnail" src="room_image/<?= stripslashes(trim(htmlentities($row['image']))) ?>">
                      </td>
                      <td>
                        <a href="edit-room.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
      var room_id = $(this).data("del");
      console.log(room_id);
      get_delId(room_id); //argument    
      });
   }

   function get_delId(room_id) {
    $.ajax({
      type: 'POST',
      url: 'fetch_row/delete.php',
      data: {
       room_id:room_id
      },
      success: function (result){
        swal({
        title: "Are you sure to delete this room?",
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


 