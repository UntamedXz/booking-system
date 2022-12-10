<?php 
require './config/reservation_class.php';
require './config/conn.php';
require_once "controllers/register.php";
require_once "controllers/inquire.php";
require 'lib/header.php';
require 'lib/nav.php';
?>

<section class="py-5 bg-dark">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h4>Inquiries</h4>
			</div>
			<div class="card-body">
				<?php 
				if(isset($_GET['id']))
				{
					$user_id = $_GET['id'];
					$conn = new class_model();
					$reserve = $conn->fetchIdinquireByUsers($user_id);
					if($reserve > 0)
					{
						foreach($reserve as $row)
						{
							?>
				<form method="POST" autocomplete="off">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-mg-6 col-lg-6">
								<h4>Client Name</h4>
								<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
								<input class="form-control" disabled type="text" value="<?= $row['name'] ?>">
							</div>
							<div class="col-mg-6 col-lg-6">
								<h4>Email Address</h4>
								<input class="form-control" disabled type="text" value="<?= $row['email'] ?>">
							</div>
							<div class="col-mg-6 col-lg-6">
								<h4>Message</h4>
								<textarea disabled class="form-control" rows="5"><?= $row['message'] ?></textarea>
							</div>
							<div class="col-mg-6 col-lg-6 mb-3">
								<h4>Reply</h4>
								<textarea disabled class="form-control" rows="5"><?= $row['reply'] ?></textarea>
							</div>
							<?php 
								if($row['read_reply'] == 0)
								{
									?>
									<div class="col-md-12 col-lg-12">
										<button class="btn btn-success" name="read_reply">Mark as Read</button>
									</div>
									<?php
								}else
								{
									?>
									<div class="col-md-12 col-lg-12">
										<button class="btn btn-success" name="read_reply_0">Mark as Unread</button>
									</div>
									<?php
								}
							 ?>
						</div>
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
</section>


<!-- Footer-->
<?php require 'lib/footer.php'; ?>