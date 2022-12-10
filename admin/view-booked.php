<?php 
require_once '../controllers/update-client.php';
include './head.php';
include('includes/fetch.php');
?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                          <div class="row">
						  <div class="col-md-12 mb-5 pt-4">
							<div class="card">
								<div class="card-header">
									<h4>Client Details</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['id']))
									{
										$conn = new class_model();
										$book_id = $_GET['id'];
										$subtotal = 0;
										$subtotal1 = 0;
										$datas = $conn->fetchClientId($book_id);
										if($datas > 0)
										{
											foreach($datas as $row)
											{
												?>
													<div class="col-md-12 col-lg-12">
														<div class="row">
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Client Name :</label><br>
																<?= $row['client_name'] ?>
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Room Name</label><br>
																<?= $row['room_name'] ?>
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Day Accomodation</label><br>
																<?= $row['room_type_id'] ?>
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Payment Type</label><br>
																<?= $row['payment_type'] ?>
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Date of Accomodation</label><br>
																<?= date('M-d-Y h:i:A', strtotime($row['date_accomodation'])); ?>
																
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Number of Occupants</label><br>
																<?= $row['number_p'] ?>
															</div>
															<div class="col-lg-6 col-md-6 mb-3">
																<label style="font-weight: bold;">Room Price</label><br>
																<?= number_format($row['price']); ?>
															</div>
															<?php
																$subtotal = 180;
																$nightTotal = $subtotal*$row['number_p'];
																$a = $nightTotal+=$row['price'];
																$subtotal1 = 150;
																$morningTotal = $subtotal1*$row['number_p'];
																$b = $morningTotal+=$row['price'];  
																if($row['room_type_id'] == 'Night')
																{
																	?>
																	<div class="col-lg-6 col-md-6 mb-3">
																		<label style="font-weight: bold;">Room Price + Entrance Fee</label><br>
																		<?= number_format($a); ?>
																	</div>
																	<?php
																	
																}
																else if($row['room_type_id'] == 'Morning')
																{
																	?>
																	<div class="col-lg-6 col-md-6 mb-3">
																		<label style="font-weight: bold;">Room Price + Entrance Fee</label><br>
																		<?= number_format($b); ?>
																	</div>
																	<?php
																}
																
															?>
																<div class="col-lg-6 col-md-6 mb-3">
																	<label style="font-weight: bold;">Reservation Status</label><br>
																	<?= $row['status'] ?>
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

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
include('includes/scripts.php'); 
include './bottom.php'
?>