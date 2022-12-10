<?php
session_start();
require './config/reservation_class.php';
require './config/conn.php';
require_once 'controllers/book_room.php';
require 'lib/header.php';
require 'lib/nav.php';
?>


<section class="py-5">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h5>Room Description<a class="btn btn-light btn-sm float-end" href="reservation.php">Back to Rooms and Cottages</a></h5>
			</div>
			<div class="card-body">
				<?php 
				if(isset($_GET['id'])){
					$conn = new class_model();
					$room_id = $_GET['id'];
					$datas = $conn->fetchByID($room_id);
					$total_price = 0;
					if($datas > 0)
					{
						foreach($datas as $row)
						{
							?>
							<div class="col-md-12 col-lg-12">
								<div class="row">
									<div class="col-lg-8 col-md-8">
										<h4>Room Name : <?= $row['category'] ?></h4>
										<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
													<img src="admin/room_image/<?= $row['image'] ?>" class="d-block w-100" alt="Room Image">
												</div>
												<div class="carousel-item">
													<img src="admin/room_image/<?= $row['image_2'] ?>" class="d-block w-100" alt="Room Image">
												</div>
												<div class="carousel-item">
													<img src="admin/room_image/<?= $row['image_3'] ?>" class="d-block w-100" alt="Room Image">
												</div>
												<div class="carousel-item">
													<img src="admin/room_image/<?= $row['image_4'] ?>" class="d-block w-100" alt="Room Image">
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
										<div class="col-md-12 col-lg-12">
                                    <p class="text-center">
                                    <h4 class="text-danger">Reminders:</h4>
                                    <h6>Please be reminded that, Additional Entrance fee will be added to your Payment.</h6>
                                    <hr>
                                    <h5 class="fw-bolder">Total</h5>
                                    <h3 class="fw-bolder">Room Price : ₱ <?= number_format($row['price']); ?></h3>
                                    <h6 class="fw-bolder">Entrance Fee Per Head: Day = 150, Night = 180</h6>
                                    <h4>Room Amount Total : ₱ <?= number_format($row['price']);  ?> </h4>
                                </p>
                                </div>
									</div>
									<div class="col-md-4 col-lg-4">
										<div class="col-lg-12 col-md-12">
											<label class="text-danger">Capacity</label><br>
                                           <h4 class="fw-bolder"><?= $row['person'] ?> Person</h4>
										</div>
										<div class="col-lg-12 col-md-12 mb-2">
                                           <label class="text-danger">Appliances Available</label><br>
                                           <h4 class="fw-bolder"><?= $row['name'] ?></h4>
                                       </div>
                                       <div class="col-lg-12 col-md-12 mb-4">
                                          <label class="text-danger">Room Price</label><br>
                                           <h4 class="fw-bolder">₱ <?= number_format($row['price']); ?></h4>
                                       </div>
                                       <div class="col-lg-12 col-md-12 mb-4">
                                           <label class="text-danger">Entrace Fee Per Head</label><br>
                                           <h4 class="fw-bolder">₱ 150 for Morning 180 for Night</h4>
                                       </div>
                                       <div class="col-lg-12 col-md-12">
                                           <?php 
                                        if($row['availability'] == 0)
                                        {
                                            ?>
                                            <span class="badge p-auto px-4 py-3 bg-danger btn disabled text-white">Fully Booked!</span>
                                            <?php
                                        }else
                                        {
                                            ?>
                                            <?php 
                                                if(isset($_SESSION['user_id']))
                                                {
                                                    ?>
                                                    <a class="btn btn-success mt-auto" href="book-room.php?roomid=<?= $row['id'] ?>">Book this Room</a>
                                                    <?php
                                                }else
                                                {
                                                    ?>
                                                    <a class="btn btn-outline-danger mt-auto" data-bs-toggle="modal" data-bs-target="#loginModal">Login To Continue</a>
                                                    <?php
                                                }
                                             ?>
                                            <?php
                                        }
                                     ?>
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
	</section>






	<?php require 'lib/footer.php'; ?>

