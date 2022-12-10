
<?php 
include './head.php';
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
								<?php 
                                if($_SESSION['role'] == 'ADMIN') {
                                ?>
                                <div class="row">
									<div class="col-md-12 pt-4">
										<div class="card">
											<div class="card-header">
												<h4 class="text-left text-uppercase">Add Staff</h4>
											</div>
											<div class="card-body">
												<form id="add_staff_form" enctype="multipart/form-data">
													<div class="row">
														<div class="col-md-6">
														<label>Name</label>
														<input type="text" placeholder="Enter Full Name" name="name" class="form-control">
														</div>
														<div class="col-md-6">
														<label>Username</label>
														<input type="text" placeholder="Enter Userame" name="username" class="form-control">
														</div>
														<div class="col-md-6">
														<label>Email Address</label>
														<input type="text" placeholder="Enter Email Address" name="email" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Profile Image</label>
															<input type="file" name="image" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Password</label>
															<input type="password" placeholder="Enter Password" name="password" class="form-control">
														</div>
														<input type="hidden" name="role" value="STAFF">
														<div class="col-md-12">
															<button type="submit" name="add_staff" class="form-control btn btn-dark mt-3 save">Save</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
                                <?php
                                }
                                ?>

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
													<a href="view-user.php?id=<?= $row['user_id'] ?>"class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
													<?php
													if($_SESSION['role'] == "ADMIN") {
													?>
													<button class="btn btn-danger btn-sm delete_D" data-del="<?= htmlentities($row['user_id']); ?>"><i  class="fas fa-trash"></i></button>
													<?php
													}
													?>
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
		if(localStorage.getItem("status") == "success") {
			swal("Success!", "Staff added successfully!", "success");
			localStorage.removeItem("status");
		} else if(localStorage.getItem("status") == "deleted") {
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
			get_delId(delete_staff);
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

		$('#add_staff_form').on('submit', function(e) {
			e.preventDefault();

			var form = new FormData(this);
			form.append('add_staff', true);
			$.ajax({
				url: "../controllers/add_staff.php",
				type: "POST",
				data: form,
				dataType: 'text',
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					if (data == 'success') {
						localStorage.setItem('status', 'success');
						location.reload();
					} else if(data == 'file not supported') {
						swal("Failed!", "File not supported!", "error");
					} else if(data == 'file too large') {
						swal("Failed!", "File too large!", "error");
					} else if(data == 'email already used') {
						swal("Failed!", "Email already used!", "error");
					} else if(data == 'username already used') {
						swal("Failed!", "Username already used!", "error");
					} else {
						swal("Failed!", "Something went wrong!", "error");
					}
					console.log(data);
				}
			})
		})

	});
</script>
<?php
include './bottom.php'
?>