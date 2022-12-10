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
						  <div class="col-md-12 mb-5 pt-4">
							<div class="card">
								<div class="card-header">
									<h4 class="text-dark text-left text-uppercase">Add Rooms</h4>
								</div>
								<div class="card-body">
									<form  method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-6 d-flex flex-column">
											<label class="mb-0">Select Room Category</label>
											<select name="category_id" class="form-select mb-2 text-center" style="height: 36.5px !important; line-height: 36.5px !important; padding: 0 10px; border-radius: 3px; border-color: #c5ccd3;">
											<option selected >Select Category</option>
											<?php 
												include '../config/con2.php';
												$sql = "SELECT * FROM `room_category`";
												$stmt = $conn->prepare($sql); 
												$stmt->execute();
												$result = $stmt->get_result();
												foreach ($result as $row) {
											?>
												<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
											<?php
											} 
											?>
											</select>
											</div>
											<div class="col-md-6">
												<label class="mb-0">Name</label>
												<input type="text" placeholder="Enter Room Name" name="name" class="form-control mb-2">
											</div>
											<div class="col-md-6">
												<label class="mb-0">Morning Price</label>
												<input type="number" placeholder="Morning Price" name="morning_price" class="form-control mb-2">
											</div>
											<div class="col-md-6">
												<label class="mb-0">Night Price</label>
												<input type="number" placeholder="Night Price" name="night_price" class="form-control mb-2">
											</div>
											
											<div class="col-md-12">
												<label class="mb-0">Reminder</label>
												<textarea class="form-control mb-2" name="description" placeholder="Enter Description"></textarea>
											</div>
											<div class="col-md-6">
												<label class="mb-0">Image 1</label>
												<input type="file" required name="image1" class="form-control mb-2">
											</div>
											<div class="col-md-6">
												<label class="mb-0">Image 2 </label>
												<input type="file" required name="image2" class="form-control mb-2">
											</div>
											<div class="col-md-6">
												<label class="mb-0">Availability</label>
												<input type="number" name="numbers" class="form-control" placeholder="Add Numbers of Available Rooms">
											</div>
											<div class="col-md-6">
												<label class="mb-0">Number of Person</label>
												<input type="number" name="person" class="form-control" placeholder="Add Number of Capacity for Person">
											</div>
											<div class="col-md-12">
												<button type="submit" name="room_add" class="form-control btn btn-dark mt-3 save">Add</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
                          </div>

						  <div class="row">
							<div class="col-md-12">
							<div class="card my-4">
								<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
								<div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
									<h4 class="text-dark text-uppercase ps-3 text-left">Room List</h4>
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
										<th class="text-dark  font-weight-bolder opacity-7">Morning Price</th>
										<th class="text-dark  font-weight-bolder opacity-7">Night Price</th>
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
										<td class="px-3"><?= number_format($row['morning_price']); ?></td>
										<td class="px-3"><?= number_format($row['night_price']); ?></td>
										<td class="px-3"><?= $row['availability'] ?></td>
										<td>
											<img style="width: 200px;" class="img-thumbnail" src="room_image/<?= stripslashes(trim(htmlentities($row['image']))) ?>">
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

	function get_delId(room_id) {
		swal({
			title: "Are you sure to delete this room?",
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
					room_id:room_id
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