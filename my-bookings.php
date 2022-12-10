<?php 
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require_once './controllers/update_booking.php';
require 'lib/header.php';
require 'lib/nav.php';
?>

<section class="py-3 mb-5">
	<div class="container-fluid">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4>Your Booked Details</h4>
				</div>
				<div class="card-body">
				<?php 
				if(isset($_GET['details'])){
				$conn = new class_model();
				$room_id = $_GET['details'];
				$user_id = $_SESSION['user_id'];
				$total_price = 0;
				$total_price1 = 0;
				$datas = $conn->fetchBookByroomID($room_id, $user_id);
				if($datas > 0)
				{
					foreach($datas as $row)
					{
						?>
					<form method="POST">
						<div class="col-md-12 col-lg-12">
							<div class="row">
								<div class="col-lg-8 col-md-8">
									<div class="row">
										<input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
										<input type="hidden" name="room_id" value="<?=$row['id'] ?>">
										<div class="col-lg-6 col-md-6 mb-2">
										<h6>Room Name</h6>
										<input disabled class="form-control" type="text" value="<?= $row['room_name'] ?>">
										</div>
										<div class="col-lg-6 col-md-6 mb-2">
											<h6>Day of Accomodation</h6>
											<input disabled class="form-control" type="text" value="<?= $row['room_type'] ?>">
										</div>
										<div class="col-lg-6 col-md-6 mb-2">
											<h6>Payment Type</h6>
											<input disabled class="form-control" type="text" value="<?= $row['payment_type'] ?>">
										</div>
										<div class="col-lg-6 col-md-6 mb-2">
											<h6>Number of Occupants</h6>
											<input disabled class="form-control" type="text" value="<?= $row['number_p'] ?>">
										</div>
                                        <div class="col-lg-6 col-md-6 mb-2">
											<h6>Age of Occupants</h6>
											<input disabled class="form-control" type="text" value="<?= $row['ages'] ?>">
										</div>
										<div class="col-lg-6 col-md-6 mb-2">
											<h6>Date of Accomodation</h6>
											<input disabled class="form-control" type="text" value="<?= date('M-d-Y', strtotime($row['date_accomodation'])); ?> ">
										</div>
										<div class="col-lg-6 col-md-6 mb-2">
											<h6>Status</h6>
											<input disabled class="form-control" type="text" value="<?= $row['status'] ?>">
										</div>
										<?php 
											if($row['status'] == 'CONFIRMED' && $row['reference_no'] == '' && $row['payment_type'] =='Through Counter')
											{
												?>
												<!-- <div class="col-md-12 col-lg-12">
													<h6>Reference Number</h6>
													<input required class="form-control" type="text" name="reference_no" placeholder="Please, Enter the Reference Number you receive here...">
												</div> -->
												<?php
											}else if($row['status'] == 'CONFIRMED' && $row['reference_no'] == '' && $row['payment_type'] =='Gcash')
											{
												?>
												<div class="col-md-12 col-lg-12">
													<h6>Reference Number</h6>
													<input required class="form-control" type="text" name="reference_no" placeholder="Please, Enter the Reference Number you receive here...">
												</div>
												<?php
											}
										 ?>
										 <?php 
										 	if($row['status'] == 'PENDING')
										 	{
										 		?>
										 		<div class="col-md-12 col-lg-12 mt-2" >
												 	<b><p>Wait for the Admin or Staff to Confirm your Book</p>
												 Reminder:</b>
											<p> When you select the Thru Counter option, you can print your Booking Confirmation<br> and present to Counter or Staff in Strike RGP Resort .</p>
											Once our staff has confirmed your booking, you can proceed with the <b>Print</b> below</br>
										
										
										<br>
										</div>
										 		<?php
										 	}
										  ?>
										<div class="col-md-12 col-lg-12">
											<p style="justify-content: center; text-align: justify;">
												<h3>Room Price:  ₱ <?= number_format($row['room_price']); ?></h3>
												<h6>Additional Entrance Fee <small><span class="text-danger">(One year old and below are FREE!)</span></small>: 
												<?php
                                                $per_head_fee = $row['per_head_fee'];

												 		echo $per_head_fee . " per head";
												?>
												</h6>
												<h5>Total Payment: <?php echo $row['room_price'] . " + " . $row['head_fee']; ?>
												</h5>
                                                <?php 
                                                $total = $row['room_price'] + $row['head_fee'];
                                                ?>
                                                <h5>
                                                    Total Price: <?php echo number_format((float)$total, 2, '.', ''); ?>
                                                </h5>
											</p>
										</div>
										<?php 
											if($row['reference_no'] == '' && $row['status'] == 'CONFIRMED' && $row['payment_type'] =='Gcash')
											{
												?>
												<div class="col-md-12 col-lg-12">
													<button class="btn btn-success" name="update_booking" type="submit">Submit Reference Number</button>
												</div>
													<?php 
														if($row['room_type'] == 'Night' && $row['status'] == 'CONFIRMED')
														{
															?>
																<a data-amount="<?= $finalTotal; ?>" data-fee="0" data-expiry="24" data-description="Payment for services rendered" data-href="https://getpaid.gcash.com/paynow" data-public-key="pk_72355ed60731edfffb4198856a0185b3" onclick="this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');" href="https://getpaid.gcash.com/paynow?public_key=pk_72355ed60731edfffb4198856a0185b3&amp;amount=100&amp;fee=0&amp;expiry=24&amp;description=Payment for services rendered" target="_blank" class="x-getpaid-button"><img src="https://getpaid.gcash.com/assets/img/paynow.png"></a>	
															<?php
														}else
														{
															?>
															<a data-amount="<?= $total_of_morning; ?>" data-fee="0" data-expiry="24" data-description="Payment for services rendered" data-href="https://getpaid.gcash.com/paynow" data-public-key="pk_72355ed60731edfffb4198856a0185b3" onclick="this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description');" href="https://getpaid.gcash.com/paynow?public_key=pk_72355ed60731edfffb4198856a0185b3&amp;amount=100&amp;fee=0&amp;expiry=24&amp;description=Payment for services rendered" target="_blank" class="x-getpaid-button"><img src="https://getpaid.gcash.com/assets/img/paynow.png"></a>	
															<?php
														}
													 ?>
												<?php
											}else if($row['reference_no'] !== NULL && $row['status'] == 'PAID')
											{
												?>
												<div class="col-md-12 col-lg-12">
													<h6>Paid @</h6>
													<input disabled class="form-control" type="text" name="" value="<?= date('M d, Y h:i A',strtotime($row['paid_at'])) ?>">
												</div>
												<?php
											}
										 ?>
									</div>
									<div class="col-md-10 col-lg-10">
									<a class="btn btn-dark btn-rounded" href="print.php?id=<?= $row['id'] ?>"><i class="bi bi-printer"></i></a>
									
									</div>
								</div>
								<div class="col-md-4 col-lg-4">
									<h5>Room Image</h5>
									<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
									  <div class="carousel-inner">
									    <div class="carousel-item active">
									      <img src="admin/room_image/<?= $row['image'] ?>" class="d-block w-100">
									    </div>
									    <div class="carousel-item">
									      <img src="admin/room_image/<?= $row['image_2'] ?>" class="d-block w-100">
									    </div>
									    <div class="carousel-item">
									      <img src="admin/room_image/<?= $row['image_3'] ?>" class="d-block w-100">
									    </div>
									    <div class="carousel-item">
									      <img src="admin/room_image/<?= $row['image_4'] ?>" class="d-block w-100">
									    </div>
									  </div>
									  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
									    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
									    <span class="visually-hidden">Previous</span>
									  </button>
									  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true"></span>
									    <span class="visually-hidden">Next</span>
									  </button>
									</div>
								</div>
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
	</div>
</section>

<?php include 'lib/footer.php'; ?>



