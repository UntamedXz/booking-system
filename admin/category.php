<?php 
include './head.php';
include('includes/fetch.php');
require_once '../controllers/add_category.php';
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
						  <div class="col-md-12 pt-4">
							<div class="card">
								<div class="card-header">
									<h4>Add Category</h4>
								</div>
								<div class="card-body">
									<form method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-6">
											<label>Name</label>
											<input type="text" placeholder="Enter Category Name" name="name" class="form-control">
											</div>
											<div class="col-md-6">
												<label>Slug</label>
												<input type="text" placeholder="Slug" name="slug" class="form-control">
											</div>
											<div class="col-md-2">
												<button type="submit" name="add_category" class="form-control btn btn-dark mt-3 save">Save</button>
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
									<h6 class="text-white text-capitalize ps-3 text-center">Category List</h6>
								</div>
								</div>
								<div class="card-body">
								<?php 
									$conn = new class_model();
									$category = $conn->fetchcategory();
									?>
								<div class="table-responsive" style="width: 100%;">
									<table id="tableData" class="table table-striped table-hover" style="width: 100%;">
									<thead>
										<tr>
										<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Name</th>
										<th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Slug Actions</th>
										<th class="text-dark text-center ">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if(!empty($category)){ 
										foreach ($category as $row){ 
											?>  
										<tr>
										<td><?= $row['name'] ?></td> 
										<td><?= $row['slug'] ?></td>
										<td style="text-align: center;">
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
		if(localStorage.getItem("status") == "deleted") {
			swal("Success!", "Category deleted successfully!", "success");
      		localStorage.removeItem("status");
		} else if(localStorage.getItem("status") == "added") {
			swal("Success!", "Category added successfully!", "success");
      		localStorage.removeItem("status");
		}
	})

	$(document).ready(function() {
    $('#tableData').DataTable(); 
	});

	load_data();    
	var count = 1; 
	function load_data() {
		$(document).on('click', '.delete_D', function() {
		var category_id = $(this).data("del");
		console.log(category_id);
		get_delId(category_id); //argument    
		});
	}

	function get_delId(category_id) {
		swal({
		title: "Are you sure to delete this category?",
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
				category_id:category_id
				},
				success: function (result){
					localStorage.setItem("status", "deleted");
					location.reload();
				}
			});
			}
		});
	}
</script>
<?php
include './bottom.php'
?>