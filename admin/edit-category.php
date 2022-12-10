<?php 
$title = "Edit Category | Booking System";
include('includes/header.php');
require_once '../controllers/edit_category.php';
?>
<div class="container mt-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Edit Category</h4>
				</div>
				<div class="card-body">
					<?php 
					if(isset($_GET['id'])){
						$conn = new class_model();
						$id = $_GET['id'];
						$datas = $conn->fetchcategoryByID($id);
						if($datas > 0)
						{
							foreach($datas as $row)
							{
								?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<input type="hidden" name="category_id" value="<?= $row['id'] ?>">
										<div class="col-md-6">
											<label>Name</label>
											<input type="text" placeholder="Enter Category Name" name="name" class="form-control" value="<?= $row['name'] ?>">
										</div>
										<div class="col-md-6">
											<label>Slug</label>
											<input type="text" placeholder="Slug" value="<?= $row['slug'] ?>" name="slug" class="form-control">
										</div>
										<div class="col-md-2">
											<button type="submit" name="edit_category" class="form-control btn btn-dark mt-3">Save</button>
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


<?php
include('includes/scripts.php'); 
include('includes/footer.php');
?>