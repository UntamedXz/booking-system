<?php 
include './head.php';
include('includes/fetch.php');
require_once '../controllers/add_room.php';
?>
<style>
	.save {
		background-color: #38a0a6 !important;
        border: 1px solid #38a0a6 !important;
	}

	.save:hover {
		background-color: #1c465a !important;
        border: 1px solid #1c465a !important;
	}
</style>
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
									<h4 class="text-dark text-uppercase ps-3 text-left">Income Report</h4>
								</div>
								</div>
								<div class="card-body">
								<div class="table-responsive">
									<table id="tableData" class="table table-hover">
									<thead>
										<tr>
										<th class="text-dark text-md opacity-10 ps-2">No.</th>
                                        <th class="text-dark text-md opacity-10">Name</th>
                                        <th class="text-dark text-md opacity-10">Room</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Appointment Date</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Paid Date</th>
                                        <th class="text-dark text-md opacity-10 ps-2">Total</th>
										</tr>
									</thead>
                                    <tbody>
                                      <?php
                                      $get_reservation_today = mysqli_query($con, "SELECT *, re.room_type_id AS day, re.id AS room_id, u.name as user, room.name as room_name, u.name as user_name  FROM tbl_reservation re LEFT JOIN tbl_user u ON u.user_id = re.user_id LEFT JOIN tbl_room room ON room.id = re.room_id LEFT JOIN room_category cat ON cat.id = room.category_id WHERE re.status = 'PAID'");

                                      if(mysqli_num_rows($get_reservation_today) != 0){ 
                                        foreach ($get_reservation_today as $row){ 
                                          ?>  
                                      <tr>
                                        <td><?= $row['room_id']; ?></td>
                                        <td><?= $row['user_name'] ?></td>
                                        <td><?= $row['room_name'] ?></td>
                                        <td><?= date('M-d-y', strtotime($row['date_accomodation'])); ?></td>
                                        <td><?= date('M-d-y', strtotime($row['paid_date'])); ?></td>
                                        <td style="text-align: center;">
                                        <?= $row['total'] ?>
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
		if(localStorage.getItem("status") == "added") {
			swal("Success!", "Room added successfully!", "success");
			localStorage.removeItem("status");
		} else if(localStorage.getItem("status") == "deleted") {
			swal("Success!", "Room deleted successfully!", "success");
			localStorage.removeItem("status");
		}
	})

	$(document).ready(function() {   
        $('#tableData').DataTable();  
	load_data();    
	var count = 1; 
	function load_data() {
		$(document).on('click', '.delete_D', function() {
		var room_id = $(this).data("del");
		console.log(room_id);
		get_delId(room_id); //argument    
		});
	}

	});
</script>

<?php
include './bottom.php'
?>