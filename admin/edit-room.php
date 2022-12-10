<?php 
include './head.php';
include('includes/fetch.php');
include('../config/conn.php');
require_once '../controllers/update-room.php';

if(isset($_SESSION['status'])) {
	$status = $_SESSION['status'];

	if($status == "added") {
		?>
		<script>
			swal("Success!", "Room updated successfully!", "success");
			localStorage.removeItem("status");
		</script>
		<?php
		unset($_SESSION['status']);
	}
}
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
									<h4 class="text-left text-uppercase text-dark">Edit Rooms</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['id'])){
										$conn = new class_model();
										$room_id = $_GET['id'];
										$datas = $conn->fetchByID($room_id);
										if($datas > 0)
										{
											foreach($datas as $row)
											{
												?>
												<form  method="POST" enctype="multipart/form-data">
													<div class="row">
														<input type="hidden" name="room_id" value="<?= $row['id'] ?>">
														<div class="col-md-6 d-flex flex-column">
															<label class="mb-0">Select Room Category</label>
															<select name="category_id" class="form-select mb-2 text-center" style="height: 36.5px !important; line-height: 36.5px !important; padding: 0 10px; border-radius: 3px; border-color: #c5ccd3;" required>
																<option selected >Select Category</option>
																	
																	<?php
																	$get_category = mysqli_query($con, "SELECT * FROM room_category");

																	foreach($get_category as $category) {
																	$selected = '';

																	if($row['category_id'] == $category['id']) {
																		$selected = 'selected';
																	}
																	?>
																	<option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>><?php echo $category['name'] ?></option>
																	<?php
																	}
																	?>
															</select>
														</div>
														<div class="col-md-6">
															<label class="mb-0">Name</label>
															<input type="text" value="<?= $row['name'] ?>" placeholder="Enter Room Name" name="name" class="form-control mb-2" required>
														</div>
														<div class="col-md-6">
															<label class="mb-0">Morning Price</label>
															<input type="text" value="<?= $row['morning_price'] ?>" placeholder="Morning Price" name="morning_price" class="form-control mb-2" required>
														</div>
														<div class="col-md-6">
															<label class="mb-0">Night Price</label>
															<input type="text" value="<?= $row['night_price'] ?>" placeholder="Night Price" name="night_price" class="form-control mb-2" required>
														</div>
														<div class="col-md-12">
															<label class="mb-0">Reminder</label>
															<textarea class="form-control mb-2" name="description" placeholder="Enter Description"><?= $row['description'] ?></textarea>
														</div>
														<div class="col-md-6 col-lg-6 d-flex flex-column">
															<label>Image 1</label>
															<input type="hidden" name="old_image1" value="<?= $row['image'] ?>">
															<img class="w-50 mb-2" src="room_image/<?= $row['image'] ?>">
														</div>
														<div class="col-md-6 col-lg-6 d-flex flex-column">
															<label>Image 2</label>
															<input type="hidden" name="old_image2" value="<?= $row['image_2'] ?>">
															<img class="w-50 mb-2" src="room_image/<?= $row['image_2'] ?>">
														</div>
														<div class="col-md-6 col-lg-6 d-flex flex-column">
															<input type="file" name="image1" class="form-control mb-2">
														</div>
														<div class="col-md-6 col-lg-6 d-flex flex-column">
															<input type="file" name="image2" class="form-control mb-2">
														</div>
														<div class="col-md-6">
															<label class="mb-0">Availability</label>
															<input value="<?= $row['availability'] ?>" type="number" name="numbers" class="form-control" placeholder="Add Numbers of Available Rooms" required>
														</div>
														<div class="col-md-6">
															<label class="mb-0">Number of Person</label>
															<input value="<?= $row['person'] ?>" type="number" name="person" class="form-control" placeholder="Add Number of Capacity for Person" required>
														</div>
														<div class="col-md-12">
															<button type="submit" name="update_room" class="form-control btn btn-dark mt-3 save">Update</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
										<?php 
										}
									}
								}

									?>
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
		if(localStorage.getItem("status") == "updated") {
			swal("Success!", "Room updated successfully!", "success");
			localStorage.removeItem("status");
		}
	});
</script>
<?php
include './bottom.php'
?>