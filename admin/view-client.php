<?php 
include './head.php';
include '../config/conn.php';
include('includes/fetch.php');
require_once '../controllers/update-client.php';
?>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body pt-4">
                          <div class="row">
						  <div class="col-md-12 mb-5">
							<div class="card">
								<div class="card-header">
									<h4>Client Details</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['reservationID']))
									{
										$conn = new class_model();
										$book_id = $_GET['reservationID'];
										$subtotal = 0;
										$subtotal1 = 0;
										$datas = $conn->fetchClientId($book_id);
										if($datas > 0)
										{
											foreach($datas as $row)
											{
												?>
												<form method="POST" autocomplete="off">
													<div class="col-md-12 col-lg-12">
														<div class="row">
															
															<input type="hidden" name="user_id" value="<?= $row['user_id'] ?>"> 
															<input type="hidden" name="room_id" value="<?= $row['room_id'] ?>">
															<input type="hidden" name="book_id" value="<?= $row['book_id'] ?>">
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Client Name</label>
																<input class="form-control" disabled type="text" name="client_name"  value="<?= $row['client_name'] ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Room Name</label>
																<input class="form-control" disabled type="text" name="room_name" value="<?= $row['room_name'] ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Day Accomodation</label>
																<input class="form-control" disabled type="text" name="day_acc"  value="<?= $row['room_type_id'] ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Payment Type</label>
																<input class="form-control" name="pay_type" disabled type="text"  value="<?= $row['payment_type'] ?>">
															</div>
                                                            <?php 
                                                            if($row['gcash_proof'] != null || $row['gcash_proof'] != '') {
                                                            ?>
                                                            <div class="col-md-12 col-lg-12 p-0 d-flex flex-row">
                                                                <div class="col-lg-6 col-md-6 mb-3 d-flex flex-column">
                                                                    <label>Proof of Payment</label>
                                                                    <img style="width: 150px;" id="gcash_proof" src="../gcash_proof/<?= $row['gcash_proof'] ?>" alt="">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                    <label>Gcash Reference No.</label>
                                                                    <input class="form-control" name="pay_type" disabled type="text"  value="<?= $row['gcash_reference'] ?>">
                                                                </div>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Date of Accomodation</label>
																<input class="form-control" name="date_f" disabled type="text"  value="<?= date('M-d-Y', strtotime($row['date_accomodation'])); ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Number of Occupants</label>
																<input class="form-control" disabled type="text"  value="<?= $row['number_p'] ?>">
															</div>
                                                            <div class="col-lg-6 col-md-6 mb-3">
																<label>Age of Occupants</label>
																<input class="form-control" disabled type="text"  value="<?= $row['ages'] ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Room Price</label>
																<input class="form-control" disabled type="text"  value="<?= number_format($row['room_price']); ?>">
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
                                                                <label>Room Price + Entrance Fee</label>
                                                                <input type="hidden" name="total_price" value="<?= number_format((float)$row['room_price'] + $row['head_fee'], 2, '.', ''); ?>">
                                                                <input class="form-control" disabled type="text"  value="<?= number_format((float)$row['room_price'] + $row['head_fee'], 2, '.', ''); ?>">
                                                            </div>
															<?php 
																if($row['status'] == 'PENDING')
																{

																}
																else if($row['status'] == 'CONFIRMED')
																{
																	?>
																	<div class="col-lg-6 col-md-6 mb-3">
																			<label>Payment Status</label>
																			<input class="form-control" disabled type="text"  value="<?= $row['status'] ?>">
																		</div>
																	<?php
																}
															?>
																<?php 
																	if($row['status'] == 'CONFIRMED')
																	{
																		?>
																		<input type="hidden" name="number_p" value="<?= $row['number_p'] ?>">
																		<input type="hidden" name="pay_type" value="<?= $row['payment_type'] ?>">
																		<input type="hidden" name="client_name" value="<?= $row['client_name'] ?>">
																		<input type="hidden" name="room_name" value="<?= $row['room_name'] ?>">
																		<input type="hidden" name="day_acc" value="<?= $row['room_type_id'] ?>">
																		<input type="hidden" name="date_f" value="<?= $row['date_accomodation'] ?>">
																		<input type="hidden" name="user_email" value="<?= $row['email'] ?>">
																		<input type="hidden" name="status" value="<?= $row['status'] ?>">
                                                                        <div class="col-md-12 col-lg-12">
																		    <button class="btn btn-success" name="PAID">Paid</button>
                                                                        </div>
																		<?php
																	}else
																	{
																		?>
																		<div class="col-lg-6 col-md-6 mb-3">
																			<label>Payment Status</label>
																			<input class="form-control" disabled type="text"  value="<?= $row['status'] ?>">
																		</div>
																		<?php 
																			if($row['status'] == 'PAID')
																			{
																				?>
																				<div class="col-lg-6 col-md-6 mb-3">
																					<label>Check In / Out</label>
																					<input class="form-control" disabled type="text"  value="<?= $row['check_in_out']; ?>">
																				</div>
																				<?php
																			}else if($row['status'] == 'PENDING')
																			{
																				?>
                                                                                <div class="col-md-12 col-lg-12">
                                                                                <button class="btn btn-success" name="confirm">CONFIRM</button>
                                                                                </div>
																				<?php
																			}
																		?>
																		<?php
																	}
																?>
																
															</div>
														<?php 
														if($row['status'] == 'PAID' && $row['check_in_out'] == null)
														{
															?>
															<div class="col-md-12 col-lg-12">
																<button class="btn btn-success" name="check_in">CHECK IN CLIENT?</button>
															</div>
															<?php
														}
														?>
														<?php 
														if($row['check_in_out'] == 'CHECKED IN')
														{
															?>
															<div class="col-md-12 col-lg-12">
																<button class="btn btn-success" name="check_out">CHECK Out</button>
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
    $('#gcash_proof').click(function(e) {
        e.preventDefault();

        var img_to_load = $(this).attr('src'),
        imgWindow = window.open(img_to_load);
    });

    $(window).on('load', function() {
        if(localStorage.getItem('status') == 'confirmed') {
            swal({
                title: "Success!",
                text: "Client status confirmed!",
                icon: "success",
                type: "success"
            }).then(function() {
                localStorage.removeItem('status');
            });
        } else if(localStorage.getItem('status') == 'paid') {
            swal({
                title: "Success!",
                text: "Client fully paid!",
                icon: "success",
                type: "success"
            }).then(function() {
                localStorage.removeItem('status');
            });
        } else if(localStorage.getItem('status') == 'checked_in') {
            swal({
                title: "Success!",
                text: "Client checked in!",
                icon: "success",
                type: "success"
            }).then(function() {
                localStorage.removeItem('status');
            });
        }
    })
</script>
<?php
include './bottom.php'
?>