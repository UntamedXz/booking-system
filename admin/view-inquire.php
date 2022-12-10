<?php 
$title = "View Inquire Details | Booking System";
include('includes/header.php');
require_once '../controllers/reply.php';
?>
<div class="container mt-2 mb-5">
	<div class="row">
		<div class="col-md-12 mb-5">
			<div class="card">
				<div class="card-header">
					<h4>Inquiry Details</h4>
				</div>
				<div class="card-body">
					<?php 
					if(isset($_GET['id']))
					{
						$conn = new class_model();
						$id = $_GET['id'];
						$datas = $conn->InquireByid($id);
						if($datas > 0)
						{
							foreach($datas as $row)
							{
								?>
								<form method="POST" autocomplete="off">
									<div class="col-md-12 col-lg-12">
										<div class="row">
											<div class="col-lg-4 col-md-4 mb-3">
												<input type="hidden" name="inquire_id" value="<?= $row['id'] ?>">
												<label>Inquire By</label>
												<input disabled class="form-control" type="text"  value="<?= $row['name'] ?>">
											</div>
											<div class="col-lg-4 col-md-4 mb-3">
												<label>Email</label>
												<input disabled class="form-control" type="text"  value="<?= $row['email'] ?>">
											</div>
											<div class="col-lg-4 col-md-4 mb-3">
												<label>Subject</label>
												<input disabled class="form-control" type="text"  value="<?= $row['subject'] ?>">
											</div>
											<div class="col-lg-12 col-md-6 mb-3">
												<label>Message</label>
												<textarea disabled class="form-control" rows="5"><?= $row['message'] ?></textarea>
											</div>

											<?php 
												if($row['reply'] == NULL)
												{
													?>
													<div class="col-lg-12 col-md-6 mb-3">
														<label>Add Reply</label>
														<input required class="form-control" name="message" placeholder="Add Reply here...">
													</div>
													<div class="col-md-12 col-lg-12">
														<button type="submit" name="add_reply" class="btn btn-primary">Reply</button>
													</div>
													<?php
												}else
												{
													?>
													<div class="col-lg-12 col-md-6 mb-3">
														<label>Reply</label>
														<textarea disabled class="form-control" rows="5"><?= $row['reply'] ?></textarea>
													</div>
													<?php
												}
											 ?>
											
									</div>
								</form>
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