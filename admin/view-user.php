<?php 
include './head.php';
include('includes/fetch.php');
?>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                          <div class="row">
						  <div class="col-md-12 mb-5 pt-4">
							<div class="card">
								<div class="card-header">
									<h4>Staff Details</h4>
								</div>
								<div class="card-body">
									<?php 
									if(isset($_GET['id']))
									{
										$conn = new class_model();
										$id = $_GET['id'];
										$subtotal = 0;
										$subtotal1 = 0;
										$datas = $conn->sessionUser($id);
										if($datas > 0)
										{
											foreach($datas as $row)
											{
												?>
												<form method="POST" autocomplete="off">
													<div class="col-md-12 col-lg-12">
														<div class="row">
															<input type="hidden" name="book_id" value="<?= $row['user_id'] ?>">
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Staff Name</label>
																<input readonly class="form-control" type="text"  value="<?= $row['name'] ?>">
															</div>
															
															<div class="col-lg-6 col-md-6 mb-3">
																<label>User Name</label>
																<input readonly class="form-control" type="text"  value="<?= $row['admin_username'] ?>">
															</div>
															
															<div class="col-lg-6 col-md-6 mb-3">
																<label>Email</label>
																<input readonly class="form-control" type="text"  value="<?= $row['email'] ?>">
															</div>

															<div class="col-lg-6 col-md-6 mb-3">
																<label>Role</label>
																<input readonly class="form-control" type="text"  value="<?= $row['role'] ?>">
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