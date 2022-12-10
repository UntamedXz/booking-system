<?php 
 $title = "Dashboard | Booking System";
include('includes/header.php');
include('includes/fetch.php');
 ?>

 <div class="container">
 	<div class="row py-5">
 		<div class="col-md-12">
 			 <div class="row">
         <?php if($_SESSION['role'] == 'ADMIN'): ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <?php foreach ($rooms_number as $number_of_rooms): ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">All Rooms</p>
                <h4 class="mb-0"><?= $number_of_rooms['rooms']; ?></h4>
              </div>
              <?php endforeach;?>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a class="text-success font-weight-bolder" href="view-room.php" style="text-decoration: none;">View</a></p>
            </div>
          </div>
        </div>
      <?php endif; ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              
              <?php foreach ($count_reserve as $number_of_reserve): ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Bookings</p>
                <h4 class="mb-0"><?= $number_of_reserve['reserve']; ?></h4>
              </div>
               <?php endforeach;?>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a class="text-success font-weight-bolder" href="reservations.php" style="text-decoration: none;">View</a></p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <?php foreach ($count_reserve as $number_of_reserve): ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Reservations</p>
                <h4 class="mb-0"><?= $number_of_reserve['reserve']; ?></h4>
              </div>
               <?php endforeach;?>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a class="text-success font-weight-bolder" href="reservations.php" style="text-decoration: none;">View</a></p>
            </div>
          </div>
        </div>

       
        <div class="col-xl-3 col-sm-6 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">money</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Income Report</p>
                <?php 
                require_once '../config/con2.php';
                $sql = "SELECT SUM(price) AS value_sum from tbl_sales ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {              
                  ?>
                  <h4 class="mb-0">₱ <?= number_format_short($row['value_sum']); ?></h4>
                <?php } ?>
              </div>
            </div>
            
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Total Income</span>&nbsp;</p>
            </div>
          </div>
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