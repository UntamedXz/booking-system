<?php 
include './head.php';
include('includes/fetch.php');
include('../config/conn.php');

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
									<h4 class="text-left text-uppercase text-dark">Edit Head Fee</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['id'])){
										$id = $_GET['id'];
                                        $datas = mysqli_query($con, "SELECT * FROM tbl_headfee WHERE id = $id");
										if(mysqli_num_rows($datas) > 0)
										{
											foreach($datas as $row)
											{
												?>
												<form  id="edit_headfee_form" enctype="multipart/form-data">
													<div class="row">
														<input type="hidden" name="id" value="<?= $row['id'] ?>">
														<div class="col-md-6">
															<label class="mb-0">Day</label>
															<input type="text" value="<?= $row['name'] ?>" placeholder="Enter Room Name" name="name" class="form-control mb-2" readonly required>
														</div>
														<div class="col-md-6">
															<label class="mb-0">Price</label>
															<input type="number" value="<?= $row['price'] ?>" placeholder="Morning Price" name="price" class="form-control mb-2" required>
														</div>
														<div class="col-md-12">
															<div class="col-lg-2 col-md-4 p-0">
                                                                <button type="submit" name="update_room" class="form-control btn btn-dark mt-3 save">Update</button>
                                                            </div>
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

    $(document).ready(function(e) {
        $('#edit_headfee_form').on('submit', function(e) {
            e.preventDefault();

            var form = new FormData(this);
            form.append('edit_headfee', true);
            $.ajax({
                url: "../controllers/edit-headfee.php",
                type: "POST",
                data: form,
                dataType: 'text',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if(data == 'success') {
                        swal({
                        title: "Success!",
                        text: "Head fee updated successfully!",
                        icon: "success",
                        type: "success"
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            })
        })
    })
</script>
<?php
include './bottom.php'
?>