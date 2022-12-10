<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require 'lib/header.php';
require 'lib/nav.php';
?>

<section class="py-3 mb-5">
	<div class="container">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4>My Bookings<a class="btn btn-danger float-right" href="reservation.php">Book Now</a></h4>
				</div>
				<div class="card-body" style="width: 100%;">
					<?php
						$user_id = $_SESSION['user_id']; 
						$conn = new class_model();
						$reserve = $conn->fetchRoomsByID($user_id);
						?>
					<div class="table-responsive">
						<table id="example" class="table table-hover">
							<thead>
								<tr">
									<th class="text-center">ROOM NAME</th>
									<th class="text-center">PAYMENT TYPE</th>
									<th class="text-center">STATUS</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
							<?php
								if(!empty($reserve)){ 
									foreach ($reserve as $row){ 
										?>  
										<tr>
											<td class="text-center"><?= $row['room_n'] ?></td>
											<td class="text-center"><?= $row['payment_type'] ?></td>
											<td class="text-center"><?= $row['status'] ?></td>
											<td class="text-center">
												<a class="btn btn-info btn-sm" href="my-bookings.php?details=<?= $row['reserve_id'] ?>"><i class="bi bi-eye text-white"></i></a>
                                                <?php
												if($row['status'] == 'PENDING') {
												?>
												<button type="button" class="btn btn-danger btn-sm" id="delete_booking" data-id="<?= $row['reserve_id'] ?>"><i class="bi bi-trash-fill text-white"></i></button>
												<?php
												}
												?>
											</td>
										</tr>
										<?php
									} 
								} else {
									?>
									<tr>
										<td style="text-align: center;" colspan="4"> No data available in table</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
    $(window).on('load', function (e) {  
        if(localStorage.getItem("status") == "cancelled") {
			swal("Success!", "Reservation cancelled successfully!", "success");
			localStorage.removeItem("status");
		}
    })
   $(document).ready(function() {   
    // $('#example').DataTable();  

   load_data();    
   var count = 1; 
   function load_data() {
     $(document).on('click', '.delete_D', function() {
      var reserve_id = $(this).data("del");
      console.log(reserve_id);
      get_delId(reserve_id); //argument    
      });
   }

  $('#delete_booking').on('click', function(e) {
    e.preventDefault();
    var book_id = $(this).data('id');
    swal({
        title: "Are you sure to cancel this reservation?",
        text: "Once cancelled, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((get_delId) => {
        if (get_delId) {
            $.ajax({
                type: 'POST',
                url: './controllers/cancel-booking.php',
                data: {
                book_id: book_id,
                cancel: true,
                },
                success: function (result){
                    if(result == 'cancelled') {
                        localStorage.setItem('status', 'cancelled');
                        location.reload();
                    } else {
                        swal("Failed!", "Something went wrong!", "error");
                    }
                    console.log(result);
                }
            });
        }
    });
  })

});
 </script>

<?php include 'lib/script.php'; ?>