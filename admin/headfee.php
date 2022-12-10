
<?php 
require_once '../config/conn.php';
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
								<div class="row">
									<div class="col-md-12">
										<div class="card my-4">
										<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
											<div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
											<h4 class="text-dark ps-3 text-left" style="text-transform: uppercase;">Head Fee</h4>
											</div>
										</div>
										<div class="card-body">
											<div class="table-responsive">
											<table id="tableData" class="table table-hover">
												<thead>
												<tr>
													<th class="text-dark text-md opacity-10 ps-2">Day</th>
													<th class="text-dark text-md opacity-10">Fee</th>
													<th class="text-dark text-center ">Actions</th>
												</tr>
												</thead>
												<tbody>
												<?php
                                                $get_headfee = mysqli_query($con, "SELECT * FROM tbl_headfee");

                                                foreach($get_headfee as $headfee) {
												?>  
												<tr>
													<td><?= $headfee['name']; ?></td>
													<td><?= $headfee['price'] ?></td>
                                                    <td class="text-center">
													<a href="edit-headfee.php?id=<?= $headfee['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
													</td> 
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