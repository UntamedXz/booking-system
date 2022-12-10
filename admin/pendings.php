<?php 
 $title = "View All Pendings |  Booking System";
include('includes/header.php');
 ?>
		<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">All Reservations</h6>
              </div>
            </div>
            <div class="card-body">
               <?php 
                  $conn = new class_model();
                  $booked = $conn->fetchPendings();
                  ?>
              <div class="table-responsive">
                <table id="tableData" class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-dark text-md opacity-10 ps-2">No.</th>
                      <th class="text-dark text-md opacity-10">Name</th>
                      <th class="text-dark text-md opacity-10">Room</th>
                      <th class="text-dark text-md opacity-10 ps-2">Date of Accomodation</th>
                      <th class="text-dark text-md opacity-10 ps-2">Status</th>
                      <th class="text-dark text-center ">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($booked)){ 
                      foreach ($booked as $row){ 
                        ?>  
                  	 <tr>
                      <td><?= $row['room_id']; ?></td>
                      <td><?= $row['user'] ?></td>
                      <td><?= $row['name'] ?></td>
                      <td><?= date('M-d-y h:i:A', strtotime($row['date_accomodation'])); ?></td>
                      <td><?= $row['status'] ?></td>
                      <td>
                        <a href="view-client.php?reservationID=<?= $row['room_id'] ?>"class="btn btn-success btn-sm">View</a>
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